import { artists } from "./data.js";

// --- State ---
let activeSlug = null;
let showBrightSweep = false;
let hasInteracted = false;
let ytReady = false;
let player = null;

// --- DOM refs ---
const app = document.getElementById("app");
let wall = null;
let audio = null;
const tileRefs = {};
const slugs = artists.map((a) => a.slug);

// --- Init ---
function init() {
  buildAudio();
  render();
  loadYouTubeAPI();

  const hash = window.location.hash.replace("#", "");
  if (hash && artists.some((a) => a.slug === hash)) {
    hasInteracted = true;
    setActiveSlug(hash);
  } else {
    audio.play().catch(() => null);
    setTimeout(() => {
      if (!hasInteracted) {
        showBrightSweep = true;
        renderWall();
      }
    }, 3000);
  }

  window.addEventListener("keydown", handleKeyDown);
}

// --- Audio ---
function buildAudio() {
  audio = document.createElement("audio");
  audio.loop = true;
  audio.preload = "auto";
  const source = document.createElement("source");
  source.src = "audio/vinyl-21.mp3";
  source.type = "audio/mpeg";
  audio.appendChild(source);
}

// --- YouTube API ---
function loadYouTubeAPI() {
  if (window.YT && window.YT.Player) {
    ytReady = true;
    return;
  }
  const script = document.createElement("script");
  script.src = "https://www.youtube.com/iframe_api";
  script.async = true;
  document.body.appendChild(script);
  window.onYouTubeIframeAPIReady = () => {
    ytReady = true;
    if (activeSlug) mountPlayer();
  };
}

function mountPlayer() {
  const artist = artists.find((a) => a.slug === activeSlug);
  if (!artist || !ytReady || !window.YT || !window.YT.Player) return;

  if (player) {
    player.loadVideoById(artist.embed);
    return;
  }

  player = new window.YT.Player("persona-video", {
    videoId: artist.embed,
    playerVars: { autoplay: 1, controls: 1, rel: 0 },
    events: {
      onReady: (e) => e.target.playVideo(),
      onStateChange: (e) => {
        if (e.data !== window.YT.PlayerState.ENDED) return;
        if (!activeSlug) return;
        const i = slugs.indexOf(activeSlug);
        if (i === -1) return;
        setActiveSlug(slugs[(i + 1) % slugs.length]);
      },
    },
  });
}

// --- State setter ---
function setActiveSlug(slug) {
  activeSlug = slug;

  if (slug) {
    audio.pause();
    window.history.replaceState(null, "", "#" + slug);
  } else {
    window.history.replaceState(null, "", window.location.pathname);
    audio.play().catch(() => null);
  }

  render();

  if (slug) {
    mountPlayer();
    scrollToActive();
  }
}

function scrollToActive() {
  if (!wall || !activeSlug || !tileRefs[activeSlug]) return;
  const tile = tileRefs[activeSlug];
  const targetLeft = tile.offsetLeft - wall.clientWidth / 2 + tile.clientWidth / 2;
  wall.scrollTo({ left: Math.max(0, targetLeft), behavior: "smooth" });
}

// --- Keyboard ---
function handleKeyDown(e) {
  if (e.key === "Escape") {
    if (activeSlug) setActiveSlug(null);
    return;
  }
  if (!activeSlug) return;
  if (e.key !== "ArrowRight" && e.key !== "ArrowLeft") return;

  const i = slugs.indexOf(activeSlug);
  if (i === -1) return;
  const delta = e.key === "ArrowRight" ? 1 : -1;
  hasInteracted = true;
  showBrightSweep = false;
  setActiveSlug(slugs[(i + delta + slugs.length) % slugs.length]);
}

// --- Persona section ---
function buildPersona(artist) {
  const section = document.createElement("section");
  section.className = "persona-wrap";

  const div = document.createElement("div");
  div.className = "persona";

  const closeBtn = document.createElement("button");
  closeBtn.type = "button";
  closeBtn.className = "close-btn";
  closeBtn.textContent = "x";
  closeBtn.addEventListener("click", () => setActiveSlug(null));

  const h1 = document.createElement("h1");
  h1.textContent = artist.artist;

  const p = document.createElement("p");
  p.textContent = artist.song;

  const videoDiv = document.createElement("div");
  videoDiv.id = "persona-video";
  videoDiv.className = "video";

  div.appendChild(closeBtn);
  div.appendChild(h1);
  div.appendChild(p);
  div.appendChild(videoDiv);
  section.appendChild(div);
  return section;
}

// --- Wall ---
function buildWall() {
  wall = document.createElement("ul");
  wall.className = activeSlug ? "wall scrub" : "wall";
  wall.addEventListener("wheel", (e) => {
    if (!activeSlug) return;
    if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
      wall.scrollLeft += e.deltaY;
      e.preventDefault();
    }
  }, { passive: false });
  return wall;
}

function renderWall() {
  if (!wall) return;
  for (const key in tileRefs) delete tileRefs[key];
  wall.textContent = "";

  artists.forEach((artist, index) => {
    const isActive = artist.slug === activeSlug;
    const blink = showBrightSweep && !hasInteracted;

    const li = document.createElement("li");
    const classes = [];
    if (isActive) classes.push("active");
    if (blink) classes.push("bright");
    li.className = classes.join(" ");

    const btn = document.createElement("button");
    btn.type = "button";

    const img = document.createElement("img");
    img.src = "img-songs/" + artist.slug + ".jpg";
    img.alt = artist.artist + " portrait";
    img.loading = "lazy";
    if (blink) img.style.animationDelay = index * 0.1 + "s";

    const info = document.createElement("div");
    const nameSpan = document.createElement("span");
    nameSpan.textContent = artist.artist;
    const songSpan = document.createElement("span");
    songSpan.textContent = artist.song;
    info.appendChild(nameSpan);
    info.appendChild(songSpan);

    btn.appendChild(img);
    btn.appendChild(info);
    btn.addEventListener("click", () => {
      if (!hasInteracted) {
        hasInteracted = true;
        showBrightSweep = false;
      }
      setActiveSlug(artist.slug);
    });

    li.appendChild(btn);
    tileRefs[artist.slug] = li;
    wall.appendChild(li);
  });
}

// --- Render ---
function render() {
  app.textContent = "";

  if (activeSlug) {
    const artist = artists.find((a) => a.slug === activeSlug);
    app.appendChild(buildPersona(artist));
  }

  app.appendChild(buildWall());
  renderWall();
  app.appendChild(audio);
}

// --- Boot ---
init();
