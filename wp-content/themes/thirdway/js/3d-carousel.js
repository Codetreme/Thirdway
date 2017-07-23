// Accepts the id of the container, and the classname that all three elements share
var ThreeDCarousel = function(el, classname) {
  var element = document.getElementById(el);
  var items = element.getElementsByClassName(classname);
  var classNames = ['two', 'three', 'one'];
  if (items.length !== 3) {
    alert('ThreeDCarousel only supports 3 items.');
    return false;
  } else {
    for (var i = 0; i < 3; i++) {
      items[i].className += " " + classNames[i];
    }
  }

  var obj = {
    element: element,
    items: items,
    prev: function() {
      var l = this.element.getElementsByClassName('one')[0],
        c = this.element.getElementsByClassName('two')[0],
        r = this.element.getElementsByClassName('three')[0];
      l.classList.remove('one');
      l.classList.add('two');
      c.classList.remove('two');
      c.classList.add('three');
      r.classList.remove('three');
      r.classList.add('one');
    },
    next: function() {
      var l = this.element.getElementsByClassName('one')[0],
        c = this.element.getElementsByClassName('two')[0],
        r = this.element.getElementsByClassName('three')[0];
      l.classList.remove('one');
      l.classList.add('three');
      c.classList.remove('two');
      c.classList.add('one');
      r.classList.remove('three');
      r.classList.add('two');
    }
  };
  return obj;
};

var carousel = new ThreeDCarousel('carousel', 'item');

var auto = setInterval(function() { carousel.next(); }, 200000);

var next = document.getElementById('next');
next.onclick = carousel.next.bind(carousel);

var prev = document.getElementById('prev');
prev.onclick = carousel.prev.bind(carousel);