@font-face {
    font-family: 'Arges';
    src: url('/fonts/Arges Normal Extra Heavy-normal-400-100.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: 'Geist Mono';
    src: url('/fonts/GeistMono-VariableFont_wght.ttf') format('truetype');
    font-weight: 400;
    font-style: normal;
}
:root { --bg: #0b0b0d; --panel:#121215; --text:#f7f7f7; --muted:#aeb0b6; --primary:#4cc3ff; }
* { box-sizing: border-box; }
html { background: var(--bg); }
body { margin: 0; background: radial-gradient(1200px 600px at 20% -10%, #141418, transparent), radial-gradient(1200px 600px at 80% -10%, #101016, transparent), var(--bg); color: var(--text); font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; min-height: 100vh; }
.container { width: 100%; margin: 0 auto; padding: 24px; max-width: 1312px; }
.container header { padding: 0; }
@media (max-width: 1311.98px) { .container { max-width: 960px; } }
@media (max-width: 959.98px) { .container { max-width: 350px; padding: 16px; } .container header { padding: 0; } }
header { width: 100%; height: auto; position: relative; }
.header-container { display:flex; align-items:center; justify-content:space-between; gap:16px; height: auto; padding: 56px 24px 24px; max-width: 1312px; margin: 0 auto; }
.header-center { flex: 1; display: flex; justify-content: center; }
.header-nav { display:flex; align-items:center; gap:16px; }
.header-contact { display:flex; align-items:center; gap:8px; }
.brand { display:flex; align-items:center; gap:12px; font-weight:700; width: 200px; text-decoration: none; height: 95px; }
.header-contact { width: 200px; display: flex; justify-content: flex-end; }
.brand__logo { width:128px; height:128px; display:grid; place-items:center; }
.burger-menu { display: none; flex-direction: column; cursor: pointer; width: 46px; height: 46px; justify-content: center; align-items: center; }
.burger-line { width: 24px; height: 2px; background: var(--text); margin: 2px 0; transition: all 0.3s ease; }
.burger-menu.active .burger-line:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
.burger-menu.active .burger-line:nth-child(2) { opacity: 0; }
.burger-menu.active .burger-line:nth-child(3) { transform: rotate(-45deg) translate(7px, -6px); }

/* Выпадающее меню */
.burger-dropdown { 
    position: absolute; 
    top: 0; 
    left: 0; 
    right: 0; 
    width: 100%; 
    background: #FFFFFF; 
    border-radius: 0 0 16px 16px; 
    z-index: 1000; 
    display: none; 
    opacity: 0; 
    transform: translateY(-100%); 
    transition: all 0.3s ease; 
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2); 
}
.burger-dropdown.show { 
    opacity: 1; 
    transform: translateY(0); 
}
.burger-dropdown-content { 
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    padding: 0 24px 32px; 
    gap: 32px; 
    position: relative; 
    min-height: 95px; 
}
.burger-dropdown-header { 
    display: flex; 
    flex-direction: row; 
    justify-content: space-between; 
    align-items: center; 
    width: 100%; 
    height: 95px; 
    padding: 10px 0px 0px; 
}
.burger-dropdown-logo { 
    width: 95px; 
    height: 95px; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
}
.burger-dropdown-close { 
    width: 46px; 
    height: 46px; 
    background: #000000; 
    border-radius: 5.01px; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    cursor: pointer; 
}
.burger-dropdown-nav { 
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    padding: 0px; 
    gap: 8px; 
    width: 87px; 
    height: 216px; 
}
.burger-nav-item { 
    font-family: 'Arges', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; 
    font-style: normal; 
    font-weight: 1000; 
    font-size: 39.81px; 
    line-height: 48px; 
    display: flex; 
    align-items: center; 
    text-align: center; 
    letter-spacing: 0.014em; 
    text-transform: uppercase; 
    color: #000000; 
    text-decoration: none; 
    height: 48px; 
}
.burger-nav-item:first-child { 
    color: rgba(0, 0, 0, 0.6); 
}
.burger-nav-item:hover { 
    color: rgba(0, 0, 0, 0.8); 
}
@media (max-width: 1311.98px) { 
    .container { max-width: 960px; }
    .header-container { max-width: 960px; }
}
@media (max-width: 959.98px) {
    .container { max-width: 350px; padding: 16px; }
    .header-center, .header-contact { display: none; }
    .brand { width: auto; }
    .brand__logo { width: 95px; height: 95px; }
    .brand__logo svg { width: 95px; height: 95px; }
    .burger-menu { display: flex; }
    .header-container { padding: 26px 24px 16px; max-width: none; height: 95px; }
}
nav a { color: var(--muted); text-decoration:none; margin-left:16px; font-family: 'Geist Mono', monospace; font-size: 19.2px; font-weight: 400; line-height: 16.8px; letter-spacing: 0.06px; text-transform: uppercase; vertical-align: middle; }
nav a:hover { color: #fff; }
.hero { text-align:center; padding:48px 0 24px; }
.hero h1 { font-family: 'Arges', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; font-size: 120px; line-height: 100%; letter-spacing: 0.64px; margin: 50px 0 8px; font-weight: normal; text-transform: uppercase; }
.hero h1 .sub { display:block; margin-top:8px; margin-bottom:80px; }
@media (max-width: 959.98px) {
    .hero h1 { font-size: 48px; font-weight: 1000; }
}
