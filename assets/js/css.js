document.querySelectorAll(".split").forEach((elem) => {
  let splitText = elem.innerText;
  let splitWrap = splitText.split("").join("</span><span aria-hidden='true'>");
  splitWrap = "<span aria-hidden='true'>" + splitWrap + "</span>";
  elem.innerHTML = splitWrap;
  elem.setAttribute("aria-label", splitText);
});

window.onload = function () {
  //main
  function start(callback) {
    setTimeout(() => {
      //loader는 fixed z-index999 전체고정 height:100% loaderactive붙이면 width 100%
      //loader active가 애니메이션 들어간 상태,

      // 1. start함수 실행되면 loader active 삭제되고 loader가 된 후, console.log실행
      //2. id main에 page-main class 추가되고 id root에 lock 제거 후, console.log 실행
      //3. mainTitle에서 1초뒤 실행하는 함수 실행, portTime에서 1초뒤 실행하는 함수실행
      document.querySelector(".loader").classList.remove("loader--active");
      console.log("1차 호출");
      callback();
    }, 500);
  }

  function second() {
    setTimeout(() => {
      //   document.getElementById("main").classList.add("page-main");
      document.getElementById("root").classList.remove("lock");
      console.log("2차 호출");
      mainTitle();
      sec2Cont();
    }, 1000);
  }

  start(function () {
    second();
  });

  //page__click classList add(html파일 loader)
  //**toLowerCase() 메서드는 문자열을 소문자로 변환
  document.querySelectorAll(".page__click").forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();

      const href = elem.innerText.toLowerCase();

      document.querySelector(".loader").classList.add("loader--active");
      setTimeout(() => {
        window.location.href =
          "http://minji2260.dothome.co.kr/react_port3_php/pages/" +
          href +
          ".html";

        //headerphp에서 page__click말고 다른걸로login쪽 설정 php로 끝나게
      }, 2400);
    });
  });
  //page__click2 classList add(signin,login php파일 loader)
  document.querySelectorAll(".page__click2").forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();

      const href2 = elem.innerText;

      document.querySelector(".loader").classList.add("loader--active");
      setTimeout(() => {
        window.location.href =
          "http://minji2260.dothome.co.kr/react_port3_php/sign/" +
          href2 +
          ".php";
      }, 2400);
    });
  });
  //page__click3 classList add(board php파일 loader)
  document.querySelectorAll(".page__click3").forEach((elem) => {
    elem.addEventListener("click", (e) => {
      e.preventDefault();

      const href3 = elem.innerText;

      document.querySelector(".loader").classList.add("loader--active");
      setTimeout(() => {
        window.location.href =
          "http://minji2260.dothome.co.kr/react_port3_php/board/" +
          href3 +
          ".php";
      }, 2400);
    });
  });

  //--------sec1 animation
  gsap.set(".sec1 .title h2 span", {
    opacity: 0,
    y: 150,
    display: "inline-block",
    "min-width": 20,
    rotation: "-20deg",
  });
  gsap.set(".sec1 .title p", { opacity: 0, x: 50, display: "inline-block" });

  function mainTitle() {
    let tl = gsap.timeline();
    tl.to("#header", { duration: 0.4, top: 0 });
    tl.to(
      ".sec1 .title h2 span",
      { duration: 0.4, opacity: 1, y: 0, stagger: 0.02, rotation: 0 },
      "+=0.2"
    );
    tl.to(".sec1 .title p", {
      duration: 0.4,
      opacity: 1,
      x: 0,
      ease: "power4.out",
    });
  }
  //------sec2 animation
  gsap.registerPlugin(ScrollTrigger);

  function sec2Cont() {
    const contLeft = gsap.utils.toArray(".sec2 .box_container.left");
    contLeft.forEach((left, i) => {
      ScrollTrigger.create({
        trigger: left,
        toggleClass: "active",
        start: "top 80%",
        end: "top 0%",
        //  markers:true,
        scrub: 5,
        //  toggleActions:"play none none none",
        //  once:true
      });
    });
    const constRight = gsap.utils.toArray(".sec2 .box_container.right");
    constRight.forEach((right, i) => {
      ScrollTrigger.create({
        trigger: right,
        toggleClass: "active",
        start: "top 80%",
        end: "top 0%",
        //  markers:true,
        scrub: 5,
        //  toggleActions:"play none none none",
        //  once:true
      });
    });
  }
}; //window.onload
