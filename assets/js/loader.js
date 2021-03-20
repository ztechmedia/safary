const setContentLoader = (target = ".content") => {
  $(target).html(
    '<div class="page-content-wrap">' +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="loader">Loading...</div>' +
      "</div>" +
      "</div>" +
      "</div>"
  );
};

const loadContent = (url, div) => {
  $(div).load(url);
};

const setCurrentNav = (defaultLink) => {
  setContentLoader();
  const menu = localStorage.getItem("menu");
  const submenu = localStorage.getItem("submenu");
  const currentUrl = localStorage.getItem("currentUrl");
  const secondaryUrl = localStorage.getItem("secondaryUrl");
  const secondaryTarget = localStorage.getItem("secondaryTarget");

  if (menu) $(menu).addClass("active");
  if (submenu) $(submenu).addClass("active");
  if (currentUrl) {
    setTimeout(() => {
      loadContent(currentUrl, ".content");
      if (secondaryUrl) {
        setTimeout(() => {
          loadContent(secondaryUrl, secondaryTarget);
        }, 200);
      }
    }, 200);
  } else {
    setTimeout(() => {
      loadContent(defaultLink, ".content");
    }, 200);
  }
};

const setActiveMenu = (menu) => {
  const activeMenu = localStorage.getItem("menu");
  if (activeMenu) $(activeMenu).removeClass("active");

  localStorage.setItem("menu", menu);
  $(menu).addClass("active");
};

const setActiveSub = (submenu) => {
  const activeSub = localStorage.getItem("submenu");
  if (activeSub) $(activeSub).removeClass("active");

  if (submenu) {
    localStorage.setItem("submenu", submenu);
    $(submenu).addClass("active");
  }
};

$(".x-navigation-minimize").on("click", function (e) {
  setSidebar();
  setTimeout(() => {
    window.location.reload();
  }, 1000);
});

const setSidebarOnLoad = () => {
  const sidebar = localStorage.getItem("sidebar");
  if (sidebar === "minimize") {
    setMaximize();
  } else if (sidebar === "maximize") {
    setMinimze();
  } else {
    localStorage.setItem("sidebar", "minimize");
  }
};

const setSidebar = () => {
  const sidebar = localStorage.getItem("sidebar");
  if (sidebar === "minimize") {
    localStorage.setItem("sidebar", "maximize");
    setMaximize();
  } else if (sidebar === "maximize") {
    localStorage.setItem("sidebar", "minimize");
    setMinimze();
  } else {
    localStorage.setItem("sidebar", "minimize");
    setMinimze();
  }
};

const setMinimze = () => {
  $(".page-container").addClass("page-navigation-toggled");
  $(".page-container").addClass("page-container-wide");
  $(".nav-customx").addClass("x-navigation-minimized");
};

const setMaximize = () => {
  $(".page-container").removeClass("page-navigation-toggled");
  $(".page-container").removeClass("page-container-wide");
  $(".nav-customx").removeClass("x-navigation-minimized");
};

$(".side-menu").on("click", function (e) {
  const element = $(this);
  const url = element.data("url");
  const menu = element.data("menu");

  setContentLoader();
  setActiveMenu(menu);
  setActiveSub(null);
  localStorage.setItem("currentUrl", url);
  if (url) loadContent(url, ".content");
});

$(".side-submenu").on("click", function (e) {
  const element = $(this);
  const url = element.data("url");
  const menu = element.data("menu");
  const submenu = element.data("submenu");

  setContentLoader();
  setActiveMenu(menu);
  setActiveSub(submenu);
  localStorage.setItem("currentUrl", url);
  if (url) loadContent(url, ".content");
});

$(document.body).on("click", ".link-to", function (e) {
  e.preventDefault();
  const element = $(this);
  const to = element.data("to");
  const target = element.data("target");

  localStorage.setItem("currentUrl", to);

  target ? setContentLoader(target) : setContentLoader();
  target ? loadContent(to, target) : loadContent(to, ".content");
});

$(document.body).on("click", ".link-to-unsave", function (e) {
  e.preventDefault();
  const element = $(this);
  const to = element.data("to");
  const target = element.data("target");

  target ? setContentLoader(target) : setContentLoader();
  target ? loadContent(to, target) : loadContent(to, ".content");
});

$(document.body).on("click", ".link-to-with-prev", function (e) {
  e.preventDefault();
  const element = $(this);
  const to = element.data("to");
  const target = element.data("target");

  const menu = element.data("menu");
  const submenu = element.data("submenu");

  if (menu) setActiveMenu(menu);
  if (submenu) setActiveSub(submenu);

  const prevUrl = localStorage.getItem("currentUrl");

  localStorage.setItem("currentUrl", to);
  localStorage.setItem("prevUrl", prevUrl);

  target ? setContentLoader(target) : setContentLoader();
  target ? loadContent(to, target) : loadContent(to, ".content");
});

$(document.body).on("click", ".go-back", function (e) {
  e.preventDefault();
  const element = $(this);
  const target = element.data("target");

  const to = localStorage.getItem("prevUrl");
  localStorage.setItem("currentUrl", to);

  target ? setContentLoader(target) : setContentLoader();
  target ? loadContent(to, target) : loadContent(to, ".content");
});
