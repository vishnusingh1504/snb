!function ($) {
    "use strict";
    if (window.sessionStorage) {
        var alreadyVisited = sessionStorage.getItem("is_visited");
        if (alreadyVisited) {
            // Get the link elements once
            var bootstrapStyle = document.getElementById("bootstrap-style");
            var appStyle = document.getElementById("app-style");

            // Use the asset paths defined in your Blade file ✅
            var bootstrapCss = window.ASSET_PATHS.bootstrap_css;
            var appCss = window.ASSET_PATHS.app_css;
            var bootstrapRtlCss = window.ASSET_PATHS.bootstrap_rtl_css;
            var appRtlCss = window.ASSET_PATHS.app_rtl_css;

            switch (alreadyVisited) {
                case "light-mode-switch":
                    document.documentElement.removeAttribute("dir");
                    if (bootstrapStyle.getAttribute("href") != bootstrapCss)
                        bootstrapStyle.setAttribute("href", bootstrapCss);
                    if (appStyle.getAttribute("href") != appCss)
                        appStyle.setAttribute("href", appCss);
                    document.documentElement.setAttribute("data-bs-theme", "light");
                    break;
                case "dark-mode-switch":
                    document.documentElement.removeAttribute("dir");
                    if (bootstrapStyle.getAttribute("href") != bootstrapCss)
                        bootstrapStyle.setAttribute("href", bootstrapCss);
                    if (appStyle.getAttribute("href") != appCss)
                        appStyle.setAttribute("href", appCss);
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                    break;
                case "rtl-mode-switch":
                    if (bootstrapStyle.getAttribute("href") != bootstrapRtlCss)
                        bootstrapStyle.setAttribute("href", bootstrapRtlCss);
                    if (appStyle.getAttribute("href") != appRtlCss)
                        appStyle.setAttribute("href", appRtlCss);
                    document.documentElement.setAttribute("dir", "rtl");
                    document.documentElement.setAttribute("data-bs-theme", "light");
                    break;
                case "dark-rtl-mode-switch":
                    if (bootstrapStyle.getAttribute("href") != bootstrapRtlCss)
                        bootstrapStyle.setAttribute("href", bootstrapRtlCss);
                    if (appStyle.getAttribute("href") != appRtlCss)
                        appStyle.setAttribute("href", appRtlCss);
                    document.documentElement.setAttribute("dir", "rtl");
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                    break;
                default:
                    console.log("Something wrong with the layout mode.");
            }
        }
    }
}(window.jQuery);
