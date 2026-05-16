<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Popcorn — Track. Discover. Love Film.</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500;600&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet" />
  <style>
    :root {
      --bg: #0f0f1d;
      --card: #14141c;
      --card-hover: #1c1c28;
      --yellow: #eccd51;
      --orange: #db8445;
      --text: #e5e7eb;
      --muted: #6b7280;
      --border: rgba(250, 204, 21, 0.1);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* ── SCROLLBAR ── */
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: #2a2a38; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--yellow); }

    /* ── NAVBAR ── */
    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 3rem;
      height: 68px;
      background: rgba(11, 11, 15, 0.6);
      backdrop-filter: blur(20px) saturate(1.4);
      -webkit-backdrop-filter: blur(20px) saturate(1.4);
      border-bottom: 1px solid var(--border);
      transition: background 0.3s;
    }

    .logo {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      letter-spacing: 0.05em;
      color: var(--yellow);
      text-shadow: 0 0 24px rgba(250, 204, 21, 0.5);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }
    .logo span { font-size: 1.7rem; }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 2.5rem;
      list-style: none;
    }
    .nav-links a {
      color: var(--muted);
      text-decoration: none;
      font-size: 0.875rem;
      font-weight: 500;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      transition: color 0.2s;
      position: relative;
    }
    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -4px; left: 0; right: 0;
      height: 1px;
      background: var(--yellow);
      transform: scaleX(0);
      transition: transform 0.25s ease;
    }
    .nav-links a:hover { color: var(--text); }
    .nav-links a:hover::after { transform: scaleX(1); }
    .nav-links a.active { color: var(--yellow); }
    .nav-links a.active::after { transform: scaleX(1); }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .nav-user-name {
      font-size: 0.85rem;
      color: var(--text);
      font-weight: 600;
    }
    .nav-auth-link {
      color: var(--muted);
      text-decoration: none;
      font-size: 0.82rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      transition: color 0.2s;
    }
    .nav-auth-link:hover {
      color: var(--yellow);
    }
    .nav-logout-btn {
      background: transparent;
      border: 1px solid rgba(250, 204, 21, 0.4);
      color: var(--yellow);
      border-radius: 999px;
      padding: 0.35rem 0.8rem;
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
    }
    .nav-logout-btn:hover {
      background: var(--yellow);
      color: #0b0b0f;
    }
    .nav-avatar {
      width: 38px; height: 38px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--yellow), var(--orange));
      display: flex; align-items: center; justify-content: center;
      font-weight: 700;
      font-size: 0.875rem;
      color: #0b0b0f;
      cursor: pointer;
      box-shadow: 0 0 16px rgba(250, 204, 21, 0.3);
      transition: box-shadow 0.2s, transform 0.2s;
    }
    .nav-avatar:hover {
      box-shadow: 0 0 28px rgba(250, 204, 21, 0.55);
      transform: scale(1.06);
    }

    /* ── HERO ── */
    .hero {
      position: relative;
      width: 100%;
      height: 100vh;
      min-height: 640px;
      overflow: hidden;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      background-image: url('/images/project.webp');
      background-size: cover;
      background-position: center 20%;
      transform: scale(1.04);
      animation: heroZoom 18s ease-out forwards;
    }
    @keyframes heroZoom {
      from { transform: scale(1.08); }
      to   { transform: scale(1.0); }
    }

    .hero-gradient {
      position: absolute;
      inset: 0;
      background:
        linear-gradient(to right, rgba(11,11,15,0.92) 28%, rgba(11,11,15,0.25) 60%),
        linear-gradient(to top, rgba(11,11,15,1) 0%, rgba(11,11,15,0) 40%);
    }

    .hero-content {
      position: relative;
      z-index: 2;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 0 4rem 5rem;
      max-width: 640px;
      animation: heroFadeUp 1s 0.3s ease both;
    }
    @keyframes heroFadeUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      background: rgba(250, 204, 21, 0.12);
      border: 1px solid rgba(250, 204, 21, 0.3);
      color: var(--yellow);
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      padding: 0.35rem 0.85rem;
      border-radius: 2rem;
      margin-bottom: 1.25rem;
      width: fit-content;
    }

    .hero-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(3.5rem, 7vw, 6rem);
      line-height: 0.95;
      letter-spacing: 0.02em;
      color: #fff;
      text-shadow: 0 4px 40px rgba(0,0,0,0.6);
      margin-bottom: 1.2rem;
    }

    .hero-meta {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.2rem;
      font-size: 0.8rem;
      color: var(--muted);
    }
    .hero-meta .year { color: var(--yellow); font-weight: 600; }
    .hero-meta .dot { width: 3px; height: 3px; border-radius: 50%; background: var(--muted); }
    .hero-rating {
      display: flex; align-items: center; gap: 0.3rem;
      color: var(--yellow);
    }

    .hero-desc {
      font-size: 0.975rem;
      line-height: 1.7;
      color: rgba(229,231,235,0.75);
      margin-bottom: 2rem;
      max-width: 480px;
    }

    .hero-btns {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .btn-primary {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: linear-gradient(135deg, var(--yellow), var(--orange));
      color: #0b0b0f;
      font-weight: 700;
      font-size: 0.875rem;
      padding: 0.75rem 1.75rem;
      border-radius: 0.4rem;
      border: none;
      cursor: pointer;
      text-decoration: none;
      transition: transform 0.2s, box-shadow 0.2s, filter 0.2s;
      box-shadow: 0 4px 24px rgba(249,115,22,0.4);
      letter-spacing: 0.02em;
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 36px rgba(249,115,22,0.55);
      filter: brightness(1.08);
    }

    .btn-ghost {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(255,255,255,0.07);
      backdrop-filter: blur(10px);
      color: var(--text);
      font-weight: 600;
      font-size: 0.875rem;
      padding: 0.75rem 1.75rem;
      border-radius: 0.4rem;
      border: 1px solid rgba(255,255,255,0.13);
      cursor: pointer;
      text-decoration: none;
      transition: background 0.2s, border-color 0.2s, transform 0.2s;
      letter-spacing: 0.02em;
    }
    .btn-ghost:hover {
      background: rgba(255,255,255,0.13);
      border-color: rgba(250, 204, 21, 0.4);
      transform: translateY(-2px);
    }

    /* Hero bottom fade to next section */
    .hero::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 200px;
      background: linear-gradient(to bottom, transparent, var(--bg));
      pointer-events: none;
    }

    /* ── STATS BAR ── */
    .stats-bar {
      display: flex;
      justify-content: center;
      gap: 0;
      background: var(--card);
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      overflow: hidden;
    }
    .stat-item {
      flex: 1;
      text-align: center;
      padding: 1.5rem 2rem;
      border-right: 1px solid var(--border);
      transition: background 0.2s;
    }
    .stat-item:last-child { border-right: none; }
    .stat-item:hover { background: rgba(250,204,21,0.04); }
    .stat-num {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      color: var(--yellow);
      line-height: 1;
      display: block;
    }
    .stat-label {
      font-size: 0.72rem;
      color: var(--muted);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-top: 0.25rem;
    }

    /* ── SECTIONS ── */
    .section {
      padding: 3.5rem 3rem;
      position: relative;
      
    }

    .section-header {
      display: flex;
      align-items: baseline;
      justify-content: space-between;
      margin-bottom: 1.75rem;
    }

    .section-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.75rem;
      letter-spacing: 0.04em;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .section-title .icon { font-size: 1.3rem; }

    .section-see-all {
      font-size: 0.78rem;
      color: var(--yellow);
      text-decoration: none;
      font-weight: 600;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      opacity: 0.8;
      transition: opacity 0.2s;
    }
    .section-see-all:hover { opacity: 1; }

    /* ── HORIZONTAL SCROLL ROW ── */
    .scroll-row {
      display: flex;
      gap: 1rem;
      overflow-x: auto;
      padding-bottom: 1.25rem;
      scroll-snap-type: x mandatory;
      scrollbar-width: thin;
      scrollbar-color: #2a2a38 transparent;
      -webkit-overflow-scrolling: touch;
      
    }
    .scroll-row::-webkit-scrollbar { height: 4px; }

    /* ── MOVIE CARD ── */
    .movie-card {
      flex: 0 0 160px;
      scroll-snap-align: start;
      position: relative;
      border-radius: 0.6rem;
      overflow: hidden;
      cursor: pointer;
      background: var(--card);
      transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
      group: true;
    }
    .movie-card:hover {
      transform: translateY(-6px) scale(1.03);
      box-shadow:
        0 20px 50px rgba(0,0,0,0.5),
        0 0 30px rgba(250,204,21,0.18);
      z-index: 2;
    }

    .movie-poster {
      width: 100%;
      aspect-ratio: 2/3;
      object-fit: cover;
      display: block;
      transition: filter 0.3s;
    }
    .movie-card:hover .movie-poster { filter: brightness(0.65); }

    .movie-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(11,11,15,0.95) 0%, rgba(11,11,15,0) 55%);
    }

    .movie-overlay-hover {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.25s;
    }
    .movie-card:hover .movie-overlay-hover { opacity: 1; }
    .play-btn {
      width: 44px; height: 44px;
      border-radius: 50%;
      background: rgba(250,204,21,0.9);
      display: flex; align-items: center; justify-content: center;
      font-size: 1rem;
      box-shadow: 0 4px 20px rgba(250,204,21,0.5);
      transition: transform 0.2s;
    }
    .movie-card:hover .play-btn { transform: scale(1.12); }

    .movie-info {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      padding: 0.75rem;
    }
    .movie-title {
      font-size: 0.78rem;
      font-weight: 600;
      color: #fff;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 0.3rem;
    }
    .movie-rating {
      display: flex;
      align-items: center;
      gap: 0.25rem;
      font-size: 0.7rem;
      color: var(--yellow);
      font-weight: 600;
    }
    .movie-rating .stars {
      display: flex;
      gap: 1px;
    }
    .star { font-size: 0.6rem; }
    .star.filled { color: var(--yellow); }
    .star.half { color: var(--yellow); opacity: 0.5; }
    .star.empty { color: var(--muted); }
  a{
    text-decoration: none;
    color:inherit;
  }
    /* ── RANK BADGE ── */
    .rank-badge {
      position: absolute;
      top: 0.5rem; right: 0.92rem;
      color:    rgb(215, 215, 215),black;
      text-shadow: 2px 2px 4px rgb(0, 0, 0);
      background: linear-gradient( rgba(248, 217, 97, 0.47), rgba(219,132,69,0.4));

      font-family: 'Bebas Neue', sans-serif;
      font-size: 1rem;
      width: 24px; height: 24px;
      border-radius: 0.3rem;
      display: flex; align-items: center; justify-content: center;
      z-index: 3;
    }

    /* ── FEATURED WIDE CARD ── */
    .wide-card {
      flex: 0 0 300px;
      scroll-snap-align: start;
      border-radius: 0.7rem;
      overflow: hidden;
      cursor: pointer;
      position: relative;
      background: var(--card);
      transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
    }
    .wide-card:hover {
      transform: translateY(-6px) scale(1.02);
      box-shadow: 0 20px 50px rgba(0,0,0,0.55), 0 0 30px rgba(250,204,21,0.15);
    }
    .wide-poster {
      width: 100%;
      height: 170px;
      object-fit: cover;
      display: block;
      transition: filter 0.3s;
    }
    .wide-card:hover .wide-poster { filter: brightness(0.7); }
    .wide-info {
      padding: 0.85rem;
    }
    .wide-title {
      font-family: 'DM Serif Display', serif;
      font-size: 1rem;
      color: #fff;
      margin-bottom: 0.35rem;
    }
    .wide-meta {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.72rem;
      color: var(--muted);
    }
    .genre-tag {
      background: rgba(250,204,21,0.1);
      border: 1px solid rgba(250,204,21,0.2);
      color: var(--yellow);
      font-size: 0.65rem;
      font-weight: 600;
      padding: 0.15rem 0.5rem;
      border-radius: 1rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* ── CTA SECTION ── */
    .cta-section {
      margin: 2rem 3rem 4rem;
      border-radius: 1.2rem;
      overflow: hidden;
      position: relative;
      background: linear-gradient(135deg, #1a1108 0%, #14141c 40%, #0f0e1a 100%);
      border: 1px solid rgba(250,204,21,0.12);
      padding: 4rem 3.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 2rem;
    }
    .cta-section::before {
      content: '';
      position: absolute;
      top: -80px; left: -80px;
      width: 300px; height: 300px;
      background: radial-gradient(circle, rgba(250,204,21,0.12) 0%, transparent 70%);
      pointer-events: none;
    }
    .cta-section::after {
      content: '🍿';
      position: absolute;
      right: 3rem; top: 50%;
      transform: translateY(-50%);
      font-size: 10rem;
      opacity: 0.08;
      pointer-events: none;
    }
    .cta-text h2 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 3rem;
      letter-spacing: 0.03em;
      line-height: 1;
      color: #fff;
      margin-bottom: 0.75rem;
    }
    .cta-text h2 em {
      font-style: normal;
      color: var(--yellow);
    }
    .cta-text p {
      color: var(--muted);
      font-size: 0.9rem;
      max-width: 360px;
      line-height: 1.6;
    }
    .cta-actions {
      display: flex;
      gap: 1rem;
      flex-shrink: 0;
    }

    /* ── FOOTER ── */
    footer {
      background: var(--card);
      border-top: 1px solid var(--border);
      padding: 3rem;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 2rem;
      flex-wrap: wrap;
    }
    .footer-logo {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.75rem;
      color: var(--yellow);
      text-shadow: 0 0 20px rgba(250,204,21,0.35);
      margin-bottom: 0.5rem;
    }
    .footer-tagline {
      color: var(--muted);
      font-size: 0.8rem;
      max-width: 200px;
      line-height: 1.5;
    }
    .footer-links h4 {
      font-size: 0.7rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 1rem;
      font-weight: 600;
    }
    .footer-links ul {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.6rem;
    }
    .footer-links a {
      color: rgba(229,231,235,0.5);
      text-decoration: none;
      font-size: 0.85rem;
      transition: color 0.2s;
    }
    .footer-links a:hover { color: var(--yellow); }
    .footer-copy {
      width: 100%;
      border-top: 1px solid var(--border);
      padding-top: 1.5rem;
      margin-top: 1rem;
      text-align: center;
      font-size: 0.75rem;
      color: var(--muted);
    }

    /* ── NOISE TEXTURE OVERLAY ── */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
      opacity: 0.025;
      pointer-events: none;
      z-index: 9999;
    }

    /* ── GLOW LINE ACCENT ── */
    .glow-line {
      width: 60px;
      height: 3px;
      background: linear-gradient(90deg, var(--yellow), var(--orange));
      border-radius: 2px;
      margin-bottom: 1.5rem;
      box-shadow: 0 0 12px rgba(250,204,21,0.5);
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      nav { padding: 0 1.25rem; }
      .nav-links { display: none; }
      .hero-content { padding: 0 1.5rem 4rem; }
      .section { padding: 2.5rem 1.25rem; }
      .cta-section { margin: 1rem 1.25rem 3rem; padding: 2.5rem 1.75rem; flex-direction: column; }
      .cta-section::after { display: none; }
      .cta-actions { flex-direction: column; width: 100%; }
      footer { padding: 2rem 1.25rem; }
      .stats-bar { flex-wrap: wrap; }
      .stat-item { flex: 1 1 40%; }
    }

    /* ── ANIMATED GLOW PULSE ON LOGO ── */
    @keyframes logoPulse {
      0%, 100% { text-shadow: 0 0 20px rgba(250,204,21,0.4); }
      50%       { text-shadow: 0 0 40px rgba(250,204,21,0.8), 0 0 60px rgba(249,115,22,0.4); }
    }
    .logo { animation: logoPulse 3s ease-in-out infinite; }

    /* Card stagger animation */
    .scroll-row .movie-card,
    .scroll-row .wide-card {
      animation: cardSlideIn 0.5s ease both;
    }
    @keyframes cardSlideIn {
      from { opacity: 0; transform: translateX(20px); }
      to   { opacity: 1; transform: translateX(0); }
    }
    .scroll-row .movie-card:nth-child(1) { animation-delay: 0.05s; }
    .scroll-row .movie-card:nth-child(2) { animation-delay: 0.10s; }
    .scroll-row .movie-card:nth-child(3) { animation-delay: 0.15s; }
    .scroll-row .movie-card:nth-child(4) { animation-delay: 0.20s; }
    .scroll-row .movie-card:nth-child(5) { animation-delay: 0.25s; }
    .scroll-row .movie-card:nth-child(6) { animation-delay: 0.30s; }
    .scroll-row .movie-card:nth-child(7) { animation-delay: 0.35s; }
    .scroll-row .movie-card:nth-child(8) { animation-delay: 0.40s; }
  
/* NAVBAR AVATAR */
.nav-avatar{
    width:42px;
    height:42px;
    border-radius:50%;
    cursor:pointer;
    object-fit:cover;
}

/* BACKDROP */
#profileBackdrop{
    display:none;
    position:fixed;
    inset:0;
    backdrop-filter:blur(10px);
    background:rgba(0,0,0,0.6);
    z-index:100;
}

/* PROFILE PANEL */
#profilePanel{
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:850px;
    max-height:90vh;
    overflow-y:auto;

    background:#14181c;
    border-radius:20px;

    padding:30px;

    z-index:101;

    box-shadow:0 0 40px rgba(0,0,0,0.5);

    color:white;
}

/* TOP */
.profile-top{
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:35px;
}

/* AVATAR */
.profile-avatar{
    width:110px;
    height:110px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #2c3440;
}

/* INFO */
.profile-info h2{
    font-size:28px;
    margin-bottom:5px;
}

.profile-info p{
    color:#9ab;
    margin-bottom:15px;
}

/* BUTTON */
.profile-info button{
    background:#445566;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
}

/* SECTION */
.section{
    margin-bottom:35px;
}

.section-header{
    margin-bottom:15px;
    border-bottom:1px solid #2c3440;
    padding-bottom:10px;
}

/* MOVIE GRID */
.movie-grid{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

/* POSTER */
.movie-poster{
    width:120px;
    height:180px;
    object-fit:cover;
    border-radius:10px;

    transition:0.3s;
}

.movie-poster:hover{
    transform:scale(1.05);
}

/* REVIEWS */
.reviews{
    display:flex;
    flex-direction:column;
    gap:15px;
}

/* REVIEW CARD */
.review-card{
    background:#1c2228;
    padding:15px;
    border-radius:12px;
}

.review-card h4{
    margin-bottom:8px;
}

.review-card p{
    color:#9ab;
}
  </style>
</head>
<body>
<nav>
    <a href="/" class="logo"><span>🍿</span> Popcorn</a>
<ul class="nav-links">
  <li><a href="/" class="active">Home</a></li>
  <li><a href="/list">Movies</a></li>
  <li><a href="/watchlist">Watchlist</a></li>
  <li><a href="/community">Community</a></li>
  @if(auth()->check() && auth()->user()->role === 'admin')
  <li><a href="/admin/movie/create">add movies</a></li>
  @endif
  @auth
      <li><a href="#">{{ auth()->user()->name }}</a></li>

      <li>
          <form method="POST" action="{{ route('logout') }}" style="display:inline;">
              @csrf
              <button type="submit" class="nav-logout-btn">Logout</button>
          </form>
      </li>
  @endauth

  @guest
      <li><a href="/login">Login</a></li>
      <li><a href="/register">Register</a></li>
  @endguest
</ul>

    <div class="nav-actions">
      @auth
        <span class="nav-user-name">{{ auth()->user()->name }}</span>
<div class="nav-profile">
    <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
     class="nav-avatar"
     id="openProfile">
</div>      @endauth
    </div>
  </nav>
    @yield('content')
  <!-- ═══════════════════════════════ FOOTER ═══════════════════════════════ -->
  <footer>
    <div>
      <div class="footer-logo">🍿 Popcorn</div>
      <p class="footer-tagline">Your personal cinema diary for the modern movie lover.</p>
    </div>

    <div class="footer-links">
      <h4>Discover</h4>
      <ul>
        <li><a href="#">Trending Movies</a></li>
        <li><a href="#">Top Rated</a></li>
        <li><a href="#">New Releases</a></li>
        <li><a href="#">By Genre</a></li>
      </ul>
    </div>

    <div class="footer-links">
      <h4>Community</h4>
      <ul>
        <li><a href="#">Latest Reviews</a></li>
        <li><a href="#">Film Lists</a></li>
        <li><a href="#">Friends Activity</a></li>
        <li><a href="#">Film Clubs</a></li>
      </ul>
    </div>

    <div class="footer-links">
      <h4>Account</h4>
      <ul>
        <li><a href="#">My Profile</a></li>
        <li><a href="#">Watchlist</a></li>
        <li><a href="#">Diary</a></li>
        <li><a href="#">Settings</a></li>
      </ul>
    </div>

    <div class="footer-links">
      <h4>Popcorn</h4>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">API Docs</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>

    <p class="footer-copy">© 2025 Popcorn. Made with 🍿 for film lovers everywhere.</p>
  </footer>
  <!-- BACKDROP -->
<div id="profileBackdrop"></div>

<!-- PROFILE PANEL -->
<div id="profilePanel">

    <!-- TOP -->
    <div class="profile-top">

        <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
             class="profile-avatar">

        <div class="profile-info">
            <h2>{{ auth()->user()->name }}</h2>
            <p>{{ auth()->user()->email }}</p>

<a href="{{ route('edit') }}">
    <button>Edit Profile</button>
</a>        </div>

    </div>

    <!-- WATCHLIST -->
    <div class="section">

        <div class="section-header">
            <h3>Watchlist</h3>
        </div>

        <div class="movie-grid">

            @foreach($watchlist ?? [] as $movie)

                <img src="{{ $movie->poster }}"
                     class="movie-poster">

            @endforeach

        </div>

    </div>

    <!-- RECENT REVIEWS -->
    <div class="section">

        <div class="section-header">
            <h3>Recent Reviews</h3>
        </div>

        <div class="reviews">

            <div class="review-card">
                <h4>Spider-Man: Into the Spider-Verse</h4>
                <p>Amazing animation and soundtrack.</p>
            </div>

            <div class="review-card">
                <h4>How to Train Your Dragon</h4>
                <p>Beautiful movie and emotional ending.</p>
            </div>

        </div>

    </div>

</div>
   </body>
<script>

const openProfile = document.getElementById("openProfile");
const profilePanel = document.getElementById("profilePanel");
const backdrop = document.getElementById("profileBackdrop");

// OPEN
openProfile.onclick = function(){

    profilePanel.style.display = "block";
    backdrop.style.display = "block";

};

// CLOSE
backdrop.onclick = function(){

    profilePanel.style.display = "none";
    backdrop.style.display = "none";

};

</script>
