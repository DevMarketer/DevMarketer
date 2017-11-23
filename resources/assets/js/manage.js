const accordions = document.querySelectorAll('.has-submenu')
const adminSlideButton = document.getElementById('admin-slideout-button')

function setSubmenuStyles (submenu, maxHeight, margins) {
  submenu.style.maxHeight = maxHeight
  submenu.style.marginTop = margins
  submenu.style.marginBottom = margins
}

if (adminSlideButton) {
  adminSlideButton.onclick = function () {
    this.classList.toggle('is-active');
    document.getElementById('admin-side-menu').classList.toggle('is-active');
  }
}

accordions.forEach((accordion) => {
  if (accordion.classList.contains('is-active')) {
    const submenu = accordion.nextElementSibling
    setSubmenuStyles(submenu, submenu.scrollHeight + "px", "0.75em")
  }

  accordion.onclick = function () {
    this.classList.toggle('is-active')

    const submenu = this.nextElementSibling
    if (submenu.style.maxHeight) {
      // menu is open, we need to close it now
      setSubmenuStyles(submenu, null, null)
    } else {
      // menu is closed, so we need to open it
      setSubmenuStyles(submenu, submenu.scrollHeight + "px", "0.75em")
    }
  }
})
