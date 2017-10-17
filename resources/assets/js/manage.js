const accordions = document.querySelectorAll('.has-submenu')

function setSubmenuStyles (submenu, maxHeight, margins) {
  submenu.style.maxHeight = maxHeight
  submenu.style.marginTop = margins
  submenu.style.marginBottom = margins
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
      // meny is close, so we need to open it
      setSubmenuStyles(submenu, submenu.scrollHeight + "px", "0.75em")
    }
  }
})
