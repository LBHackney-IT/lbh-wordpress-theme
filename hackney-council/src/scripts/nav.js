function Nav ($module) {
  this.$nav = $module
  this.$serviceLinks = this.$nav.querySelectorAll('.lbh-nav__link--service')
  this.$navContainer = this.$nav.querySelector('[data-module="lbh-nav-container"]')
  this.$breadcrumb = this.$nav.querySelector('.govuk-breadcrumbs__list')
  this.$navButton = document.querySelector('[data-module="lbh-nav-button"')
  this.$breadcrumbLinks = this.$breadcrumb.querySelectorAll('.govuk-breadcrumbs__link')
  this.isOpen = false;
}

Nav.prototype.bindServiceLinks = function () {
  this.showServiceNav = this.showServiceNav.bind(this)
  this.$serviceLinks = this.$nav.querySelectorAll('.lbh-nav__link--service')
  for (var i = 0; i < this.$serviceLinks.length; i++) {
    this.$serviceLinks[i].addEventListener('click', this.showServiceNav, false)
    this.$serviceLinks[i].addEventListener('keydown', this.showServiceNav, false)
  }
}

Nav.prototype.unbindServiceLinks = function () {
  for (var i = 0; i < this.$serviceLinks.length; i++) {
    this.$serviceLinks[i].removeEventListener('click', this.showServiceNav, false)
    this.$serviceLinks[i].removeEventListener('keydown', this.showServiceNav, false)
  }
}

Nav.prototype.bindNavButton = function(e) {
  this.$navButton.addEventListener('click', this.toggleNav.bind(this), false)
  this.$navButton.addEventListener('keydown', this.toggleNav.bind(this), false)
  document.addEventListener('click', function(e) {
    if (this.isOpen === true && e.target !== this.$nav && !this.$nav.contains(e.target) && e.target !== this.$navButton && !this.$navButton.contains(e.target)) {
      this.closeNav()
    }  
  }.bind(this));
}

Nav.prototype.closeNav = function() {
  this.$nav.classList.remove('lbh-nav--open')
  this.$navButton.classList.remove('lbh-header__menu-link--open')
  this.isOpen = false
}

Nav.prototype.toggleNav = function(e) {
  if (e.keyCode === 13 || e.type === 'click') {
    if (this.$nav.classList.contains('lbh-nav--open')) {
      this.closeNav()
    } else {
      this.$nav.classList.add('lbh-nav--open')
      this.$navButton.classList.add('lbh-header__menu-link--open')
      this.isOpen = true
    }
  }
}

Nav.prototype.goToBreadcrumb = function(e) {
  if (e.keyCode === 13 || e.type === 'click') {
    var nodes = Array.prototype.slice.call(this.$breadcrumb.childNodes)
    var index = nodes.indexOf(e.currentTarget.parentNode)
    this.removeLists(index + 1)
  }
}

Nav.prototype.bindBreadcrumbButtons = function() {
  this.$breadcrumbLinks = this.$breadcrumb.querySelectorAll('.govuk-breadcrumbs__link')
  this.goToBreadcrumb = this.goToBreadcrumb.bind(this)
  for (var i = 0; i < this.$breadcrumbLinks.length; i++) {
    this.$breadcrumbLinks[i].addEventListener('click', this.goToBreadcrumb, false)
    this.$breadcrumbLinks[i].addEventListener('keydown', this.goToBreadcrumb, false)
  }
}

Nav.prototype.unbindBreacrumbButtons = function() {
  for (var i = 0; i < this.$breadcrumbLinks; i++) {
    this.$breadcrumbLinks[i].removeEventListener('click', this.goToBreadcrumb, false)
    this.$breadcrumbLinks[i].removeEventListener('keydown', this.goToBreadcrumb, false)
  }
}

Nav.prototype.removeLists = function(level) {
  while (this.$navContainer.childNodes.length > level) {
    this.$navContainer.lastChild.classList.add('lbh-nav__list--loading')
    var newActiveList = this.$navContainer.childNodes[this.$navContainer.childNodes.length - 2]
    newActiveList.classList.remove('lbh-nav__list--previous')
    var $selected = newActiveList.querySelector('.lbh-nav__item--selected')
    if ($selected !== null) {
      $selected.classList.remove('lbh-nav__item--selected')
    }
    this.$navContainer.removeChild(this.$navContainer.lastChild)
    this.$breadcrumb.removeChild(this.$breadcrumb.lastChild)
  }
} 

Nav.prototype.addBreadcrumb = function(list) {
  var title = list.childNodes[0].innerText
  var listItem = document.createElement("li")
  listItem.classList.add("govuk-breadcrumbs__list-item")
  var button = document.createElement("button")
  button.classList.add("govuk-breadcrumbs__link")
  button.innerText = title
  listItem.appendChild(button)
  this.$breadcrumb.append(listItem)
  this.unbindBreacrumbButtons()
  this.bindBreadcrumbButtons()
}

Nav.prototype.showServiceNav = function(e) {
  if (e.keyCode === 13 || e.type === 'click') {
    e.preventDefault()
    var parent = e.currentTarget.parentElement
    this.showServiceNavItem(parent)
  }
}

Nav.prototype.showServiceNavItem = function(parent) {
  var siblings = getSiblings(parent)
  for (var i = 0; i < siblings.length; i++) {
    siblings[i].classList.remove('lbh-nav__item--selected')
  }
  var list = parent.querySelector('.lbh-nav__list').cloneNode(true)
  list.classList.add('lbh-nav__list--visible')
  var level = parseInt(list.getAttribute('data-level'), 10) - 1
  this.removeLists(level)
  parent.classList.add('lbh-nav__item--selected')
  this.$navContainer.appendChild(list)
  this.addBreadcrumb(list)
  list.focus()
  this.$navContainer.childNodes[this.$navContainer.childNodes.length - 2].classList.add('lbh-nav__list--previous')
  list.classList.remove('lbh-nav__list--loading')
  this.unbindServiceLinks()
  this.bindServiceLinks()
}

Nav.prototype.init = function () {
  // Check for module
  if (!this.$nav) {
    return
  }

  this.bindServiceLinks()
  this.bindBreadcrumbButtons()
  this.bindNavButton()

  var levels = ['level-1', 'level-2', 'level-3']
  for (var i = 0; i < levels.length; i++) {
    var selected = this.$navContainer.querySelector(".lbh-nav__list--" + levels[i] + " > .lbh-nav__item--selected")
    if (selected !== null) {
      this.showServiceNavItem(selected)
    } else {
      break
    }
  }
}

function getChildren(n, skipMe){
  var r = []
  for ( ; n; n = n.nextSibling ) 
    if ( n.nodeType == 1 && n != skipMe)
      r.push( n )
  return r
}

function getSiblings(n) {
  return getChildren(n.parentNode.firstChild, n)
}

export default Nav
