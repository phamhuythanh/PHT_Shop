class TextScramble {
  constructor(el) {
    this.el = el;
    this.chars = "!<>-_\\/[]{}—=+*^?#________";
    this.update = this.update.bind(this);
  }
  setText(newText) {
    const oldText = this.el.innerText;
    const length = Math.max(oldText.length, newText.length);
    const promise = new Promise((resolve) => (this.resolve = resolve));
    this.queue = [];
    for (let i = 0; i < length; i++) {
      const from = oldText[i] || "";
      const to = newText[i] || "";
      const start = Math.floor(Math.random() * 40);
      const end = start + Math.floor(Math.random() * 40);
      this.queue.push({ from, to, start, end });
    }
    cancelAnimationFrame(this.frameRequest);
    this.frame = 0;
    this.update();
    return promise;
  }
  update() {
    let output = "";
    let complete = 0;
    for (let i = 0, n = this.queue.length; i < n; i++) {
      let { from, to, start, end, char } = this.queue[i];
      if (this.frame >= end) {
        complete++;
        output += to;
      } else if (this.frame >= start) {
        if (!char || Math.random() < 0.28) {
          char = this.randomChar();
          this.queue[i].char = char;
        }
        output += `<span class="dud">${char}</span>`;
      } else {
        output += from;
      }
    }
    this.el.innerHTML = output;
    if (complete === this.queue.length) {
      this.resolve();
    } else {
      this.frameRequest = requestAnimationFrame(this.update);
      this.frame++;
    }
  }
  randomChar() {
    return this.chars[Math.floor(Math.random() * this.chars.length)];
  }
}

const phrases = [
  "Chào mừng bạn đến với PHTStore !!",
  "Đồng giá ship với nhiều đơn hàng",
  "Đổi sản phẩm trong 7 ngày",
  "Sản phẩm được bảo hành",
  "Hotline mua hàng: 0354835836 "
];

const el = document.querySelector(".text");
const fx = new TextScramble(el);

let counter = 0;
const next = () => {
  fx.setText(phrases[counter]).then(() => {
    setTimeout(next, 2300);
  });
  counter = (counter + 1) % phrases.length;
};

next();


// giữ nguyên support
var header = document.querySelector('.support');
	var origOffsetY = header.offsetTop;

	function onScroll(e) {
	window.scrollY >= 10000 ? header.classList.add('collapse') :
	header.classList.remove('collapse');
	}

	document.addEventListener('scroll', onScroll);


  //carousel
  $(document).ready(function () {
    let slider = $(".slider .items");
    let items = $(".slider .items .item .child");
    const leftButton = $("#left");
    const rightButton = $("#right");

    let scrollPos = 0;
    if (scrollPos >= 0) leftButton.hide();

    leftButton.click(function () {
      scrollPos += slider.width();
      if (scrollPos >= 0) {
        leftButton.hide();
        scrollPos = 0;
      }
      rightButton.show();
      slider.css("transform", "translate3d(" + scrollPos + "px, 0px, 0px)");
    });

    rightButton.click((e) => {
      scrollPos -= slider.width();
      if (scrollPos <= -(items.innerHeight() ) * 6) rightButton.hide();
      leftButton.show();
      slider.css("transform", "translate3d(" + scrollPos + "px, 0px, 0px)");
    });
  });


  $(window).on('load', function () {
    $(".loader").fadeOut();
    $("#preloder").delay(200).fadeOut("slow");

    /*------------------
        Gallery filter
    --------------------*/
    $('.filter__controls li').on('click', function () {
        $('.filter__controls li').removeClass('active');
        $(this).addClass('active');
    });
    if ($('.product__filter').length > 0) {
        var containerEl = document.querySelector('.product__filter');
        var mixer = mixitup(containerEl);
    }
});


//-+ quantity
let minusButton = document.querySelector(".minus-btn");
let plusButton = document.querySelector(".plus-btn");
let qtyInput = document.querySelector("#input_quantity1");

minusButton.addEventListener("click", function() {
  if (qtyInput.value > 1) {
    qtyInput.value = Number(qtyInput.value) - 1;
  }
});

plusButton.addEventListener("click", function() {
  qtyInput.value = Number(qtyInput.value) + 1;
});
