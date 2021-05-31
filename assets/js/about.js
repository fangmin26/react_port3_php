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
      sec1Cont();
    }, 1000);
  }

  start(function () {
    second();
  });

  //page__click classList add(html파일 loader)
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

  //sec1 animation
  gsap.set(".sec1 h2 span", {
    opacity: 0,
    y: 150,
    display: "inline-block",
    "min-width": 20,
    rotation: "-20deg",
  });
  gsap.set(".sec1 .dot", { width: 0 });
  gsap.set(".sec1 h3 strong", { opacity: 0, x: 50, display: "inline-block" });
  gsap.set(".sec1 h3 em", { opacity: 0, x: 50, display: "inline-block" });
  gsap.set(".sec2 .index_box li .boxes h4 span ", {
    opacity: 0,
    transform: "translate(0%,10%)",
  });
  gsap.set(".sec2 .index_box li .desc p", {
    opacity: 0,
    x: 250,
  });
  function mainTitle() {
    let tl = gsap.timeline();
    tl.to("#header", { duration: 0.4, top: 0 });
    tl.to(
      ".sec1 h2 span",
      { duration: 0.4, opacity: 1, y: 0, stagger: 0.02, rotation: 0 },
      "+=0.2"
    );
    tl.to(".sec1 .dot", { duration: 0.6, width: 1000, ease: "bounce.out" });
    tl.to(".sec1 h3 strong", {
      duration: 0.4,
      opacity: 1,
      x: 0,
      ease: "power4.out",
    });
    tl.to(".sec1 h3 em", {
      duration: 0.4,
      opacity: 1,
      x: 0,
      ease: "power4.out",
    });
  } //mainTitle()

  gsap.registerPlugin(ScrollTrigger);

  function sec1Cont() {
    const subTit = gsap.utils.toArray(".sec2 .index_tit li");
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

    const lists = gsap.utils.toArray(".sec2 .index_box li");
    lists.forEach((list, i) => {
      ScrollTrigger.create({
        trigger: list,
        toggleClass: "active",
        start: "top 90%",
        end: "top 10%",
        //  markers:true,
        //  scrub:true,
        ease: "Elastic.easeOut.config(1,0.3)",
        delay: 0.3,
        toggleActions: "play none none none",
        once: true,
      });
    });

    let tl = gsap.timeline();
    tl.to(".sec2 .index_box li .boxes h4 span", {
      transform: "translate(0%,0%)",
      delay: 1,
      opacity: 1,
      stagger: 0.2,
    });
    tl.to(".sec2 .index_box li .desc p", {
      opacity: 1,
      delay: 1,
      x: 0,
    });
    ScrollTrigger.create({
      trigger: ".sec2 .index_box li .boxes h4 span",
      // pin: true,
      start: "top 50%",
      end: "top 20%",
      markers: true,
      animation: tl,
      once: true,
    });
    ScrollTrigger.create({
      trigger: ".sec2 .index_box li .desc p",
      // pin: true,
      start: "top 50%",
      end: "top 20%",
      markers: true,
      animation: tl,
      once: true,
    });
    // const desc = gsap.utils.toArray(".sec2 .index_box li .desc p ");
    // desc.forEach((desc1, i) => {
    //   ScrollTrigger.create({
    //     trigger: desc1,
    //     toggleClass: "active",
    //     start: "top 90%",
    //     end: "top 20%",
    //     //  markers:true,
    //     scrub: true,
    //   });
    //});
    // const h4 = gsap.utils.toArray(".sec2 .index_box li .boxes h4 span");

    // h4.forEach((h41, i) => {
    //   ScrollTrigger.create({
    //     trigger: h41,
    //     toggleClass: "active",
    //     duration: 0.3,
    //     // opacity: 1,
    //     rotation: 1,
    //     stagger: 0.2,
    //     start: "top 90%",
    //     end: "top 20%",
    //     //  markers:true,
    //     scrub: true,
    //   });
    // });
  } //sec1Cont()
}; //window.onload
