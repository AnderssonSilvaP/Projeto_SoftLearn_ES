// resources/js/settings.js
console.log('settings.js carregado');

(function () {
  const STORAGE_KEY = 'softlearn.settings';
  const defaults = {
    theme: 'system', // system | light | dark
    volume: 80,
    mute: false,
    sound_effects: true,
    reduced_motion: false
  };

  const qs = id => document.getElementById(id);

  function loadSettings() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      return raw ? Object.assign({}, defaults, JSON.parse(raw)) : { ...defaults };
    } catch (e) {
      console.error(e);
      return { ...defaults };
    }
  }

  function saveSettings(s) {
    try { localStorage.setItem(STORAGE_KEY, JSON.stringify(s)); } catch (e) { console.error(e); }
  }

  function applyTheme(theme) {
    const html = document.documentElement;
    if (theme === 'dark') {
      html.classList.add('dark');
      html.classList.remove('light-theme');
    } else if (theme === 'light') {
      html.classList.remove('dark');
      html.classList.add('light-theme');
    } else {
      // system
      html.classList.remove('light-theme');
      const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      html.classList.toggle('dark', prefersDark);
    }
  }

  function applyReducedMotion(enabled) {
    document.documentElement.classList.toggle('reduced-motion', !!enabled);
  }

  function applySettings(s) {
    applyTheme(s.theme);
    applyReducedMotion(s.reduced_motion);
    saveSettings(s);
  }

  function fillForm(s) {
    if (!qs('theme')) return;
    qs('theme').value = s.theme;
    qs('volume').value = s.volume;
    qs('volume-value').innerText = (s.mute ? 0 : s.volume) + '%';
    qs('mute').checked = !!s.mute;
    qs('sound_effects').checked = !!s.sound_effects;
    qs('reduced_motion').checked = !!s.reduced_motion;
  }

  function openModal() {
    const m = qs('settings-modal');
    if (!m) return;
    m.classList.remove('hidden');
    m.classList.add('flex');
    // set focus to first control
    setTimeout(() => qs('theme')?.focus(), 80);
  }
  function closeModal() {
    const m = qs('settings-modal');
    if (!m) return;
    m.classList.remove('flex');
    m.classList.add('hidden');
  }

  // setup events
  document.addEventListener('DOMContentLoaded', () => {
    const settings = loadSettings();
    applySettings(settings);
    fillForm(settings);

    const openBtn = qs('open-settings');
    const closeBtn = qs('settings-close');
    const saveBtn = qs('settings-save');
    const resetBtn = qs('settings-reset');
    const volumeEl = qs('volume');
    const muteEl = qs('mute');
    const saveStatus = qs('save-status');

    if (openBtn) openBtn.addEventListener('click', () => { fillForm(loadSettings()); openModal(); });
    if (closeBtn) closeBtn.addEventListener('click', closeModal);

    // close on outside click
    const modal = qs('settings-modal');
    if (modal) modal.addEventListener('click', (ev) => { if (ev.target === modal) closeModal(); });

    // esc to close
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });

    if (saveBtn) {
      saveBtn.addEventListener('click', () => {
        const s = {
          theme: qs('theme') ? qs('theme').value : defaults.theme,
          volume: qs('volume') ? parseInt(qs('volume').value, 10) : defaults.volume,
          mute: qs('mute') ? !!qs('mute').checked : defaults.mute,
          sound_effects: qs('sound_effects') ? !!qs('sound_effects').checked : defaults.sound_effects,
          reduced_motion: qs('reduced_motion') ? !!qs('reduced_motion').checked : defaults.reduced_motion
        };
        applySettings(s);
        saveSettings(s);
        if (saveStatus) { saveStatus.textContent = 'Salvo'; setTimeout(()=> saveStatus.textContent = '', 1400); }
      });
    }

    if (resetBtn) {
      resetBtn.addEventListener('click', () => {
        saveSettings(defaults);
        applySettings(defaults);
        fillForm(defaults);
        if (saveStatus) { saveStatus.textContent = 'Restaurado'; setTimeout(()=> saveStatus.textContent = '', 1400); }
      });
    }

    if (volumeEl) {
      volumeEl.addEventListener('input', function () {
        const v = parseInt(this.value, 10) || 0;
        if (qs('volume-value')) qs('volume-value').innerText = ((qs('mute') && qs('mute').checked) ? 0 : v) + '%';
      });
    }

    if (muteEl) {
      muteEl.addEventListener('change', function () {
        const v = qs('volume') ? parseInt(qs('volume').value, 10) : defaults.volume;
        if (qs('volume-value')) qs('volume-value').innerText = (this.checked ? 0 : v) + '%';
      });
    }
  });
})();