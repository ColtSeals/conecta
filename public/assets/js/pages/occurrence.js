const select2nature = $('#select2nature');

if (select2nature) select2nature.wrap('<div class="position-relative"></div>').select2({
    dropdownParent: select2nature.parent(),
    ajax: {
        url: natureSearchUrl,
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            const formattedData = data.map(function(item) {
                return { id: item.id, text: item.code + ' - ' + item.description };
            });

            return { results: formattedData };
        },
        cache: true,
    },
    language: {
        inputTooShort: () => "Digite mais caracteres...",
        searching: () => "Pesquisando...",
        noResults: () => "Nenhum resultado encontrado"
    }
});

const setAddressValue = (addressComponents, property, type) => {
    const component = addressComponents.find(comp => comp.types.includes(type));

    setPropertyValue(property, (component) ? component.long_name : '');
};

if (select2nature) select2nature.on('select2:close', function (e) {
    setPropertyValue('nature', e.target.value);
});

document.addEventListener("DOMContentLoaded", function () {
    const types = ['geocode', 'establishment'];

    const inputAddress = document.querySelector('[wire\\:model="street"]');
    const inputSearchModal = document.querySelector('[wire\\:model="streetModal"]');

    const autocomplete = new google.maps.places.Autocomplete(inputAddress, { types });
    const autocompleteModal = new google.maps.places.Autocomplete(inputSearchModal, { types });

    autocomplete.addListener('place_changed', function () {
        const place = autocomplete.getPlace();

        if (place.formatted_address) setValuesAddress(place)
    })
});

function getLocationDetailsByAddress(number) {
    const geocoder = new google.maps.Geocoder();

    const inputStreet = document.querySelector('[wire\\:model="street"]').value;

    if (inputStreet.length > 0 && number.length > 0)
    {
        const searchAddress = `${number} ${inputStreet}`;

        geocoder.geocode({ 'address': searchAddress }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                const firstResult = results[0];

                setValuesAddress(firstResult)
            }
        });
    }
}

function getLocationDetailsByCep(cep) {
    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({ 'address': cep }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            const firstResult = results[0];

            if (firstResult) setValuesAddress(firstResult)
        } else {
            Livewire.emit('showAlertWarning', { title: 'Aviso', message: 'O PlusCode Global informado e invalido ou inexistente' })
        }
    });
}

function getLocationDetailsByPlusCode(plusCode) {
    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({ 'placeId': plusCode }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            console.log('Results:', results);
        } else {
            console.error('Geocode falhou com o status:', status);
        }
    });
}

function setValuesAddress(place) {
    const addressComponents = place.address_components;

    if (addressComponents) {
        setAddressValue(addressComponents, 'street', 'route');
        setAddressValue(addressComponents, 'number', 'street_number');
        setAddressValue(addressComponents, 'neighborhood', 'sublocality');
        setAddressValue(addressComponents, 'city', 'administrative_area_level_2');
        setAddressValue(addressComponents, 'state', 'administrative_area_level_1');
        setAddressValue(addressComponents, 'country', 'country');
        setAddressValue(addressComponents, 'cep', 'postal_code');

        const location = place.geometry.location;

        searchNearbyPlaces(location.lat(), location.lng());

        setPropertyValue('latitude', (location.lat()) ? location.lat() : '');
        setPropertyValue('longitude', (location.lng()) ? location.lng() : '');
        setPropertyValue('plusCode', (place.plus_code) ? place.plus_code.global_code : '');
    }
}

function searchNearbyPlaces(lat, lng) {
    const request = {
        location: { lat: lat, lng: lng },
        radius: 500,
        types: [
            'accounting', 'airport', 'amusement_park', 'aquarium', 'art_gallery', 'atm', 'bakery',
            'bank', 'bar', 'beauty_salon', 'bicycle_store', 'book_store', 'bowling_alley',
            'bus_station', 'cafe', 'campground', 'car_dealer', 'car_rental', 'car_repair', 'car_wash',
            'casino', 'cemetery', 'church', 'city_hall', 'clothing_store', 'convenience_store',
            'courthouse', 'dentist', 'department_store', 'doctor', 'drugstore', 'electrician',
            'electronics_store', 'embassy', 'fire_station', 'florist', 'funeral_home', 'furniture_store',
            'gas_station', 'gym', 'hair_care', 'hardware_store', 'hindu_temple', 'home_goods_store',
            'hospital', 'insurance_agency', 'jewelry_store', 'laundry', 'lawyer', 'library',
            'light_rail_station', 'liquor_store', 'local_government_office', 'locksmith', 'lodging',
            'meal_delivery', 'meal_takeaway', 'mosque', 'movie_rental', 'movie_theater',
            'moving_company', 'museum', 'night_club', 'painter', 'park', 'parking', 'pet_store',
            'pharmacy', 'physiotherapist', 'plumber', 'police', 'post_office', 'primary_school',
            'real_estate_agency', 'restaurant', 'roofing_contractor', 'rv_park', 'school',
            'secondary_school', 'shoe_store', 'shopping_mall', 'spa', 'stadium', 'storage', 'store',
            'subway_station', 'supermarket', 'synagogue', 'taxi_stand', 'tourist_attraction',
            'train_station', 'transit_station', 'travel_agency', 'university', 'veterinary_care', 'zoo'
        ]
    };

    const service = new google.maps.places.PlacesService(map);

    service.nearbySearch(request, function (results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            const sortedResults = sortPlacesByDistance(results, {
                lat: lat, lng: lng
            });

            displayNearbyPlaces(sortedResults);
        }
    });
}

function displayNearbyPlaces(places) {
    let nearbyPlacesList = [];

    places.forEach(function (place) {
        const userLatLng = new google.maps.LatLng(place.originLocation.lat, place.originLocation.lng);
        const placeLatLng = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());

        const distance = google.maps.geometry.spherical.computeDistanceBetween(userLatLng, placeLatLng);

        const placeInfo = {
            name: place.name,
            address: place.vicinity,
            distance: distance.toFixed(2),
        };

        nearbyPlacesList.push(placeInfo);
    });

    setPropertyValue('references', nearbyPlacesList);
}

function sortPlacesByDistance(places, originLocation) {
    places.forEach(function (place) {
        place.originLocation = originLocation;
    });

    places.sort(function (a, b) {
        const aLatLng = new google.maps.LatLng(a.geometry.location.lat(), a.geometry.location.lng());
        const bLatLng = new google.maps.LatLng(b.geometry.location.lat(), b.geometry.location.lng());

        console.log(google.maps.geometry)

        const aDistance = google.maps.geometry.spherical.computeDistanceBetween(originLocation, aLatLng);
        const bDistance = google.maps.geometry.spherical.computeDistanceBetween(originLocation, bLatLng);

        return aDistance - bDistance;
    });

    return places;
}

const inputPhone = document.querySelector('[wire\\:model="phone"]');
const inputNumber = document.querySelector('[wire\\:model="number"]');
const inputCep = document.querySelector('[wire\\:model="cep"]');
const inputPlusCode = document.querySelector('[wire\\:model="plusCode"]');

addInputMaskEventListener(inputPhone, (input) => {
    setPropertyValue('phone', formatPhoneNumber(input));
})

let timeoutId;

addInputMaskEventListener(inputNumber, (input) => {
    clearTimeout(timeoutId);

    timeoutId = setTimeout(() => {
        getLocationDetailsByAddress(input.value)
    }, 1000);
})

addInputMaskEventListener(inputCep, (input) => {
    if (input.value.length === 8) getLocationDetailsByCep(input.value);

    setPropertyValue('cep', applyCepMask(input));
})

addInputMaskEventListener(inputPlusCode, (input) => {
    const value = input.value;

    if (value.length >= 11 && value.length <= 12) getLocationDetailsByPlusCode(value);
})

