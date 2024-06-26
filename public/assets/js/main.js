 "use strict";

let isRtl = window.Helpers.isRtl(),
    isDarkStyle = window.Helpers.isDarkStyle(),
    menu,
    animate,
    isHorizontalLayout = false;

if (document.getElementById("layout-menu")) {
    isHorizontalLayout = document.getElementById("layout-menu").classList.contains("menu-horizontal");
}

(function () {
    if (typeof Waves !== "undefined") {
        Waves.init();
        Waves.attach(".btn[class*='btn-']:not(.position-relative):not([class*='btn-outline-']):not([class*='btn-label-'])", ["waves-light"]);
        Waves.attach("[class*='btn-outline-']:not(.position-relative)");
        Waves.attach("[class*='btn-label-']:not(.position-relative)");
        Waves.attach(".pagination .page-item .page-link");
        Waves.attach(".dropdown-menu .dropdown-item");
        Waves.attach(".light-style .list-group .list-group-item-action");
        Waves.attach(".dark-style .list-group .list-group-item-action", ["waves-light"]);
        Waves.attach(".nav-tabs:not(.nav-tabs-widget) .nav-item .nav-link");
        Waves.attach(".nav-pills .nav-item .nav-link", ["waves-light"]);
        Waves.attach(".menu-vertical .menu-item .menu-link.menu-toggle");
    }

    function onScroll() {
        let layoutPage = document.querySelector(".layout-page");
        if (layoutPage) {
            if (window.pageYOffset > 0) {
                layoutPage.classList.add("window-scrolled");
            } else {
                layoutPage.classList.remove("window-scrolled");
            }
        }
    }
    setTimeout(() => {
        onScroll();
    }, 200);

    window.onscroll = function () {
        onScroll();
    };

    setTimeout(function () {
        window.Helpers.initCustomOptionCheck();
    }, 1000);

    let layoutMenuEl = document.querySelectorAll("#layout-menu");
    layoutMenuEl.forEach(function (element) {
        menu = new Menu(element, {
            orientation: isHorizontalLayout ? "horizontal" : "vertical",
            closeChildren: isHorizontalLayout ? true : false,
            showDropdownOnHover: localStorage.getItem("templateCustomizer-" + templateName + "--ShowDropdownOnHover")
                ? localStorage.getItem("templateCustomizer-" + templateName + "--ShowDropdownOnHover") === "true"
                : window.templateCustomizer !== undefined
                    ? window.templateCustomizer.settings.defaultShowDropdownOnHover
                    : true,
        });

        window.Helpers.scrollToActive((animate = false));
        window.Helpers.mainMenu = menu;
    });

    let menuToggler = document.querySelectorAll(".layout-menu-toggle");
    menuToggler.forEach((item) => {
        item.addEventListener("click", (event) => {
            event.preventDefault();
            window.Helpers.toggleCollapsed();
            if (config.enableMenuLocalStorage && !window.Helpers.isSmallScreen()) {
                try {
                    localStorage.setItem("templateCustomizer-" + templateName + "--LayoutCollapsed", String(window.Helpers.isCollapsed()));
                    let layoutCollapsedCustomizerOptions = document.querySelector(".template-customizer-layouts-options");
                    if (layoutCollapsedCustomizerOptions) {
                        let layoutCollapsedVal = window.Helpers.isCollapsed() ? "collapsed" : "expanded";
                        layoutCollapsedCustomizerOptions.querySelector(`input[value="${layoutCollapsedVal}"]`).click();
                    }
                } catch (e) {}
            }
        });
    });

    window.Helpers.swipeIn(".drag-target", function (e) {
        window.Helpers.setCollapsed(false);
    });

    window.Helpers.swipeOut("#layout-menu", function (e) {
        if (window.Helpers.isSmallScreen()) window.Helpers.setCollapsed(true);
    });

    let menuInnerContainer = document.getElementsByClassName("menu-inner"),
        menuInnerShadow = document.getElementsByClassName("menu-inner-shadow")[0];

    if (menuInnerContainer.length > 0 && menuInnerShadow) {
        menuInnerContainer[0].addEventListener("ps-scroll-y", function () {
            if (this.querySelector(".ps__thumb-y").offsetTop) {
                menuInnerShadow.style.display = "block";
            } else {
                menuInnerShadow.style.display = "none";
            }
        });
    }

    function switchImage(style) {
        if (style === "system") {
            if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
                style = "dark";
            } else {
                style = "light";
            }
        }
        const switchImagesList = [].slice.call(document.querySelectorAll("[data-app-" + style + "-img]"));
        switchImagesList.map(function (imageEl) {
            const setImage = imageEl.getAttribute("data-app-" + style + "-img");
            imageEl.src = assetsPath + "img/" + setImage;
        });
    }

    //Style Switcher (Light/Dark/System Mode)
    let styleSwitcher = document.querySelector(".dropdown-style-switcher");

    let storedStyle =
        localStorage.getItem("templateCustomizer-" + templateName + "--Style") ||
        (window.templateCustomizer?.settings?.defaultStyle ?? "light");

    if (window.templateCustomizer && styleSwitcher) {
        let styleSwitcherItems = [].slice.call(styleSwitcher.children[1].querySelectorAll(".dropdown-item"));
        styleSwitcherItems.forEach(function (item) {
            item.addEventListener("click", function () {
                let currentStyle = this.getAttribute("data-theme");
                if (currentStyle === "light") {
                    window.templateCustomizer.setStyle("light");
                } else if (currentStyle === "dark") {
                    window.templateCustomizer.setStyle("dark");
                } else {
                    window.templateCustomizer.setStyle("system");
                }
            });
        });

        const styleSwitcherIcon = styleSwitcher.querySelector("i");

        if (storedStyle === "light") {
            styleSwitcherIcon.classList.add("mdi-weather-sunny");
            new bootstrap.Tooltip(styleSwitcherIcon, {
                title: "Light Mode",
                fallbackPlacements: ["bottom"],
            });
        } else if (storedStyle === "dark") {
            styleSwitcherIcon.classList.add("mdi-weather-night");
            new bootstrap.Tooltip(styleSwitcherIcon, {
                title: "Dark Mode",
                fallbackPlacements: ["bottom"],
            });
        } else {
            styleSwitcherIcon.classList.add("mdi-monitor");
            new bootstrap.Tooltip(styleSwitcherIcon, {
                title: "System Mode",
                fallbackPlacements: ["bottom"],
            });
        }
    }

    switchImage(storedStyle);

    if (typeof i18next !== "undefined" && typeof i18NextHttpBackend !== "undefined") {
        i18next
            .use(i18NextHttpBackend)
            .init({
                lng: window.templateCustomizer ? window.templateCustomizer.settings.lang : "en",
                debug: false,
                fallbackLng: "en",
                backend: {
                    loadPath: assetsPath + "json/locales/{{lng}}.json",
                },
                returnObjects: true,
            })
            .then(function (t) {
                localize();
            });
    }

    let languageDropdown = document.getElementsByClassName("dropdown-language");

    if (languageDropdown.length) {
        let dropdownItems = languageDropdown[0].querySelectorAll(".dropdown-item");

        for (let i = 0; i < dropdownItems.length; i++) {
            dropdownItems[i].addEventListener("click", function () {
                let currentLanguage = this.getAttribute("data-language");
                let textDirection = this.getAttribute("data-text-direction");

                for (let sibling of this.parentNode.children) {
                    var siblingEle = sibling.parentElement.parentNode.firstChild;

                    while (siblingEle) {
                        if (siblingEle.nodeType === 1 && siblingEle !== siblingEle.parentElement) {
                            siblingEle.querySelector(".dropdown-item").classList.remove("active");
                        }
                        siblingEle = siblingEle.nextSibling;
                    }
                }
                this.classList.add("active");

                i18next.changeLanguage(currentLanguage, (err, t) => {
                    window.templateCustomizer ? window.templateCustomizer.setLang(currentLanguage) : "";
                    directionChange(textDirection);
                    if (err) return console.log("something went wrong loading", err);
                    localize();
                });
            });
        }
        function directionChange(textDirection) {
            if (textDirection === "rtl") {
                if (localStorage.getItem("templateCustomizer-" + templateName + "--Rtl") !== "true") window.templateCustomizer ? window.templateCustomizer.setRtl(true) : "";
            } else {
                if (localStorage.getItem("templateCustomizer-" + templateName + "--Rtl") === "true") window.templateCustomizer ? window.templateCustomizer.setRtl(false) : "";
            }
        }
    }

    function localize() {
        let i18nList = document.querySelectorAll("[data-i18n]");
        let currentLanguageEle = document.querySelector('.dropdown-item[data-language="' + i18next.language + '"]');

        if (currentLanguageEle) {
            currentLanguageEle.click();
        }

        i18nList.forEach(function (item) {
            item.innerHTML = i18next.t(item.dataset.i18n);
        });
    }

    const notificationMarkAsReadAll = document.querySelector(".dropdown-notifications-all");
    const notificationMarkAsReadList = document.querySelectorAll(".dropdown-notifications-read");

    if (notificationMarkAsReadAll) {
        notificationMarkAsReadAll.addEventListener("click", (event) => {
            notificationMarkAsReadList.forEach((item) => {
                item.closest(".dropdown-notifications-item").classList.add("marked-as-read");
            });
        });
    }

    if (notificationMarkAsReadList) {
        notificationMarkAsReadList.forEach((item) => {
            item.addEventListener("click", (event) => {
                item.closest(".dropdown-notifications-item").classList.toggle("marked-as-read");
            });
        });
    }

    const notificationArchiveMessageList = document.querySelectorAll(".dropdown-notifications-archive");
    notificationArchiveMessageList.forEach((item) => {
        item.addEventListener("click", (event) => {
            item.closest(".dropdown-notifications-item").remove();
        });
    });

    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    const accordionActiveFunction = function (e) {
        if (e.type === "show.bs.collapse" || e.type === "show.bs.collapse") {
            e.target.closest(".accordion-item").classList.add("active");
        } else {
            e.target.closest(".accordion-item").classList.remove("active");
        }
    };

    const accordionTriggerList = [].slice.call(document.querySelectorAll(".accordion"));
    const accordionList = accordionTriggerList.map(function (accordionTriggerEl) {
        accordionTriggerEl.addEventListener("show.bs.collapse", accordionActiveFunction);
        accordionTriggerEl.addEventListener("hide.bs.collapse", accordionActiveFunction);
    });

    window.Helpers.setAutoUpdate(true);
    window.Helpers.initPasswordToggle();
    window.Helpers.initSpeechToText();
    window.Helpers.navTabsAnimation();
    window.Helpers.initNavbarDropdownScrollbar();

    let horizontalMenuTemplate = document.querySelector("[data-template^='horizontal-menu']");
    if (horizontalMenuTemplate) {
        if (window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT) {
            window.Helpers.setNavbarFixed("fixed");
        } else {
            window.Helpers.setNavbarFixed("");
        }
    }

    window.addEventListener(
        "resize",
        function (event) {
            if (window.innerWidth >= window.Helpers.LAYOUT_BREAKPOINT) {
                if (document.querySelector(".search-input-wrapper")) {
                    document.querySelector(".search-input-wrapper").classList.add("d-none");
                    document.querySelector(".search-input").value = "";
                }
            }
            if (horizontalMenuTemplate) {
                if (window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT) {
                    window.Helpers.setNavbarFixed("fixed");
                } else {
                    window.Helpers.setNavbarFixed("");
                }
                setTimeout(function () {
                    if (window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT) {
                        if (document.getElementById("layout-menu")) {
                            if (document.getElementById("layout-menu").classList.contains("menu-horizontal")) {
                                menu.switchMenu("vertical");
                            }
                        }
                    } else {
                        if (document.getElementById("layout-menu")) {
                            if (document.getElementById("layout-menu").classList.contains("menu-vertical")) {
                                menu.switchMenu("horizontal");
                            }
                        }
                    }
                }, 100);
            }

            window.Helpers.navTabsAnimation();
        },
        true
    );

    if (isHorizontalLayout || window.Helpers.isSmallScreen()) return;

    if (typeof TemplateCustomizer !== "undefined") {
        if (window.templateCustomizer.settings.defaultMenuCollapsed) {
            window.Helpers.setCollapsed(true, false);
        } else {
            window.Helpers.setCollapsed(false, false);
        }
    }

    if (typeof config !== "undefined") {
        if (config.enableMenuLocalStorage) {
            try {
                if (localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed") !== null) window.Helpers.setCollapsed(localStorage.getItem("templateCustomizer-" + templateName + "--LayoutCollapsed") === "true", false);
            } catch (e) {}
        }
    }
})();

if (typeof $ !== "undefined") {
    $(function () {
        window.Helpers.initSidebarToggle();

        var searchToggler = $(".search-toggler"),
            searchInputWrapper = $(".search-input-wrapper"),
            searchInput = $(".search-input"),
            contentBackdrop = $(".content-backdrop");

        if (searchToggler.length) {
            searchToggler.on("click", function () {
                if (searchInputWrapper.length) {
                    searchInputWrapper.toggleClass("d-none");
                    searchInput.focus();
                }
            });
        }

        $(document).on("keydown", function (event) {
            let ctrlKey = event.ctrlKey,
                slashKey = event.which === 191;

            if (ctrlKey && slashKey) {
                if (searchInputWrapper.length) {
                    searchInputWrapper.toggleClass("d-none");
                    searchInput.focus();
                }
            }
        });

        setTimeout(function () {
            var twitterTypeahead = $(".twitter-typeahead");
            searchInput.on("focus", function () {
                if (searchInputWrapper.hasClass("container-xxl")) {
                    searchInputWrapper.find(twitterTypeahead).addClass("container-xxl");
                    twitterTypeahead.removeClass("container-fluid");
                } else if (searchInputWrapper.hasClass("container-fluid")) {
                    searchInputWrapper.find(twitterTypeahead).addClass("container-fluid");
                    twitterTypeahead.removeClass("container-xxl");
                }
            });
        }, 10);

        if (searchInput.length) {
            var filterConfig = function (data) {
                return function findMatches(q, cb) {
                    let matches;
                    matches = [];
                    data.filter(function (i) {
                        if (i.name.toLowerCase().startsWith(q.toLowerCase())) {
                            matches.push(i);
                        } else if (!i.name.toLowerCase().startsWith(q.toLowerCase()) && i.name.toLowerCase().includes(q.toLowerCase())) {
                            matches.push(i);
                            matches.sort(function (a, b) {
                                return b.name < a.name ? 1 : -1;
                            });
                        } else {
                            return [];
                        }
                    });
                    cb(matches);
                };
            };

            var searchJson = "search-vertical.json";
            if ($("#layout-menu").hasClass("menu-horizontal")) {
                var searchJson = "search-horizontal.json";
            }

            var searchData = $.ajax({
                url: assetsPath + "json/" + searchJson,
                dataType: "json",
                async: false,
            }).responseJSON;

            searchInput.each(function () {
                var $this = $(this);
                searchInput
                    .typeahead(
                        {
                            hint: false,
                            classNames: {
                                menu: "tt-menu navbar-search-suggestion",
                                cursor: "active",
                                suggestion: "suggestion d-flex justify-content-between px-3 py-2 w-100",
                            },
                        },
                        {
                            name: "pages",
                            display: "name",
                            limit: 5,
                            source: filterConfig(searchData.pages),
                            templates: {
                                header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Pages</h6>',
                                suggestion: function ({ url, icon, name }) {
                                    return '<a href="' + url + '">' + "<div>" + '<i class="mdi ' + icon + ' me-2"></i>' + '<span class="align-middle">' + name + "</span>" + "</div>" + "</a>";
                                },
                                notFound:
                                    '<div class="not-found px-3 py-2">' +
                                    '<h6 class="suggestions-header text-primary mb-2">Pages</h6>' +
                                    '<p class="py-2 mb-0"><i class="mdi mdi-alert-circle-outline me-2 mdi-14px"></i> No Results Found</p>' +
                                    "</div>",
                            },
                        },
                        {
                            name: "files",
                            display: "name",
                            limit: 4,
                            source: filterConfig(searchData.files),
                            templates: {
                                header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Files</h6>',
                                suggestion: function ({ src, name, subtitle, meta }) {
                                    return (
                                        '<a href="javascript:;">' +
                                        '<div class="d-flex w-50">' +
                                        '<img class="me-3" src="' +
                                        assetsPath +
                                        src +
                                        '" alt="' +
                                        name +
                                        '" height="32">' +
                                        '<div class="w-75">' +
                                        '<h6 class="mb-0">' +
                                        name +
                                        "</h6>" +
                                        '<small class="text-muted">' +
                                        subtitle +
                                        "</small>" +
                                        "</div>" +
                                        "</div>" +
                                        '<small class="text-muted">' +
                                        meta +
                                        "</small>" +
                                        "</a>"
                                    );
                                },
                                notFound:
                                    '<div class="not-found px-3 py-2">' +
                                    '<h6 class="suggestions-header text-primary mb-2">Files</h6>' +
                                    '<p class="py-2 mb-0"><i class="mdi mdi-alert-circle-outline me-2 mdi-14px"></i> No Results Found</p>' +
                                    "</div>",
                            },
                        },
                        {
                            name: "members",
                            display: "name",
                            limit: 4,
                            source: filterConfig(searchData.members),
                            templates: {
                                header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Members</h6>',
                                suggestion: function ({ name, src, subtitle }) {
                                    return (
                                        '<a href="app-user-view-account.html">' +
                                        '<div class="d-flex align-items-center">' +
                                        '<img class="rounded-circle me-3" src="' +
                                        assetsPath +
                                        src +
                                        '" alt="' +
                                        name +
                                        '" height="32">' +
                                        '<div class="user-info">' +
                                        '<h6 class="mb-0">' +
                                        name +
                                        "</h6>" +
                                        '<small class="text-muted">' +
                                        subtitle +
                                        "</small>" +
                                        "</div>" +
                                        "</div>" +
                                        "</a>"
                                    );
                                },
                                notFound:
                                    '<div class="not-found px-3 py-2">' +
                                    '<h6 class="suggestions-header text-primary mb-2">Members</h6>' +
                                    '<p class="py-2 mb-0"><i class="mdi mdi-alert-circle-outline me-2 mdi-14px"></i> No Results Found</p>' +
                                    "</div>",
                            },
                        }
                    )
                    .bind("typeahead:render", function () {
                        contentBackdrop.addClass("show").removeClass("fade");
                    })
                    .bind("typeahead:select", function (ev, suggestion) {
                        if (suggestion.url) window.location = suggestion.url;
                    })
                    .bind("typeahead:close", function () {
                        searchInput.val("");
                        $this.typeahead("val", "");
                        searchInputWrapper.addClass("d-none");
                        contentBackdrop.addClass("fade").removeClass("show");
                    });

                searchInput.on("keyup", function () {
                    if (searchInput.val() === "") contentBackdrop.addClass("fade").removeClass("show");
                });
            });

            let psSearch;

            $(".navbar-search-suggestion").each(function () {
                psSearch = new PerfectScrollbar($(this)[0], {
                    wheelPropagation: false,
                    suppressScrollX: true,
                });
            });

            searchInput.on("keyup", function () {
                psSearch.update();
            });
        }
    });
}

function toggleFullScreen() {
    const el = document.documentElement;
    const iconElement = document.getElementById('fullscreen-icon');

    if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
        exitFullScreen();
        updateFullscreenIcon(false);
    } else {
        if (requestFullScreen(el)) updateFullscreenIcon(true);
    }
}

function requestFullScreen(el) {
    const requestMethods = ['requestFullscreen', 'webkitRequestFullscreen', 'mozRequestFullScreen', 'msRequestFullscreen'];

    for (let i = 0; i < requestMethods.length; i++) {
        const method = requestMethods[i];
        if (el[method]) {
            el[method]();
            return true;
        }
    }

    if (typeof window.ActiveXObject !== "undefined") {
        const wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
            return true;
        }
    }

    return false;
}

function exitFullScreen() {
    const el = document;
    const cancelMethods = ['exitFullscreen', 'webkitExitFullscreen', 'mozCancelFullScreen', 'msExitFullscreen'];

    for (let i = 0; i < cancelMethods.length; i++) {
        const method = cancelMethods[i];
        if (el[method]) {
            el[method]();
            return;
        }
    }

    if (typeof window.ActiveXObject !== "undefined") {
        const wscript = new ActiveXObject("WScript.Shell");

        if (wscript !== null) wscript.SendKeys("{F11}");
    }
}

function updateFullscreenIcon(isFullscreen) {
    const iconElement = document.getElementById('fullscreen-icon');
    iconElement.className = isFullscreen ? 'mdi mdi-arrow-collapse-all mdi-24px' : 'mdi mdi-arrow-expand-all mdi-24px';
}

const options = {
    closeButton: true,
    progressBar: true,
    timeOut: 10000,
}

Livewire.on('showAlertSuccess', (data) => toastr.success(`${data.message}`, `${data.title}`, options))
Livewire.on('showAlertInfo', (data) => toastr.info(`${data.message}`, `${data.title}`, options))
Livewire.on('showAlertWarning', (data) => toastr.warning(`${data.message}`, `${data.title}`, options))
Livewire.on('showAlertDanger', (data) => toastr.danger(`${data.message}`, `${data.title}`, options))

const modalsElement = $('#laravel-livewire-modals');

modalsElement.on('hidden.bs.modal', () => {
    Livewire.dispatch('resetModal');
});

Livewire.on('showBootstrapModal', () => {
    const modal = modalsElement.data('bs.modal');

    if (!modal) modalsElement.modal('show');
})

Livewire.on('hideModal', () => {
    const modal = modalsElement.data('bs.modal');

    console.log(modal)
    if (modal) modalsElement.modal('hide');
})

