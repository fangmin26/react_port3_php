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

  //마우스이벤트
  let cursor = document.querySelector("#cursor");
  window.addEventListener("mousemove", function (e) {
    //화면출력
    document.querySelector(".clientX").textContent = e.clientX;
    document.querySelector(".clientY").textContent = e.clientY;
    document.querySelector(".pageX").textContent = e.pageX;
    document.querySelector(".pageY").textContent = e.pageY;

    //커서이벤트
    gsap.to("#cursor", { duration: 0.1, left: e.pageX, top: e.pageY });

    // 커서hover-jscont
    document.querySelectorAll(".jscont").forEach((elem) => {
      elem.addEventListener("mouseenter", () => {
        cursor.classList.add("active");
      });
      elem.addEventListener("mouseleave", () => {
        cursor.classList.remove("active");
      });
    });
    // 커서hover-nav li
    document.querySelectorAll(".nav li").forEach((elem) => {
      elem.addEventListener("mouseenter", () => {
        cursor.classList.add("active");
      });
      elem.addEventListener("mouseleave", () => {
        cursor.classList.remove("active");
      });
    });
    //커서hover-jsdesc .p
    document.querySelectorAll(".jscont .jsdesc").forEach((elem) => {
      elem.addEventListener("mouseenter", () => {
        cursor.style.background = "rgba(255,255,255,0.2)";
      });
      elem.addEventListener("mouseleave", () => {
        cursor.style.background = "#000";
      });
    });
  });

  //sec1 애니메이션
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

  //sec2 애니메이션
  gsap.registerPlugin(ScrollTrigger);

  function sec2Cont() {
    const subTit = gsap.utils.toArray(".sec2 ul.cont_nav");
    subTit.forEach((sub, i) => {
      ScrollTrigger.create({
        trigger: sub,
        toggleClass: "active",
        start: "top 90%",
        end: "top 10%",
        //  markers:true,
        //  scrub:true,
        toggleActions: "play none none none",
        once: true,
      });
    });

    const lists = gsap.utils.toArray(".sec2 .cont");
    lists.forEach((list, i) => {
      ScrollTrigger.create({
        trigger: list,
        toggleClass: "active",
        start: "top 90%",
        end: "top 10%",
        //  markers:true,
        //  scrub:true,
        toggleActions: "play none none none",
        once: true,
      });
    });
    const clockBX = gsap.utils.toArray(".clock-box > div");
    clockBX.forEach((clock, i) => {
      ScrollTrigger.create({
        trigger: clock,
        toggleClass: "active",
        start: "top 95%",
        end: "top 15%",
        //  markers:true,
        //  scrub:6,
        // toggleActions:"play pause pause reverse",
        // once:true
      });
    });
  }
}; //window.onload
