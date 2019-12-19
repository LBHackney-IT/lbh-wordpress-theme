import { initAll } from 'lbh-frontend'
import Nav from './nav'

initAll()

var $nav = document.querySelector('[data-module="lbh-nav"]')
if ($nav) {
  new Nav($nav).init()
}
