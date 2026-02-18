"use strict";
jQuery,
    jQuery(document).ready(function (o) {
        // Use delegated handlers so cloned/dynamic elements (e.g. sticky header) still work.
        o(document)
            .off("click.sidebarContent", ".offset-side-bar")
            .on("click.sidebarContent", ".offset-side-bar", function (e) {
                e.preventDefault();
                e.stopPropagation();
                o(".cart-group").addClass("isActive");
            });

        o(document)
            .off("click.sidebarContent", ".navSidebar-button")
            .on("click.sidebarContent", ".navSidebar-button", function (e) {
                e.preventDefault();
                e.stopPropagation();
                o(".info-group").addClass("isActive");
            });

        o(document)
            .off("click.sidebarContent", ".close-side-widget")
            .on("click.sidebarContent", ".close-side-widget", function (e) {
                e.preventDefault();
                o(".info-group").removeClass("isActive");
                o(".cart-group").removeClass("isActive");
            });

        o("body")
            .off("click.sidebarContent")
            .on("click.sidebarContent", function () {
                o(".info-group").removeClass("isActive");
                o(".cart-group").removeClass("isActive");
            });

        o(document)
            .off("click.sidebarContent", ".xs-sidebar-widget")
            .on("click.sidebarContent", ".xs-sidebar-widget", function (e) {
                e.stopPropagation();
            });

            0 < o(".xs-modal-popup").length &&
                o(".xs-modal-popup").magnificPopup({
                    type: "inline",
                    fixedContentPos: !1,
                    fixedBgPos: !0,
                    overflowY: "auto",
                    closeBtnInside: !1,
                    callbacks: {
                        beforeOpen: function () {
                            this.st.mainClass = "my-mfp-slide-bottom xs-promo-popup";
                        },
                    },
                });
    });
