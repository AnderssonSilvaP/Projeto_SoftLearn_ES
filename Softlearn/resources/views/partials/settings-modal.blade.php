<div id="settings-modal" class="settings-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:1000; align-items:center; justify-content:center;">
  <div class="settings-panel" style="background:#0b1020; color:#fff; width: min(760px, 96%); max-height:90%; overflow:auto; padding:20px; border-radius:8px;">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
      <h2 style="margin:0">Configurações</h2>
      <button id="settings-close" aria-label="Fechar" style="background:transparent;border:0;font-size:20px;cursor:pointer">✕</button>
    </div>

    <form id="settings-form">
      <div style="margin-bottom:12px;">
        <label><strong>Tema</strong></label>
        <select id="theme" name="theme" style="margin-left:8px;padding:6px;">
          <option value="system">Padrão do sistema</option>
          <option value="light">Claro</option>
          <option value="dark">Escuro</option>
        </select>
      </div>

      <div style="margin-bottom:12px;">
        <label><strong>Volume</strong> <span id="volume-value" style="margin-left:6px;"></span></label>
        <input type="range" id="volume" name="volume" min="0" max="100" style="width:100%; display:block; margin-top:6px;">
        <label style="display:inline-block;margin-top:6px;"><input type="checkbox" id="mute" name="mute"> Mudo</label>
      </div>

      <div style="margin-bottom:12px;">
        <label><input type="checkbox" id="sound_effects" name="sound_effects"> Efeitos sonoros</label>
      </div>

      <div style="margin-bottom:12px;">
        <label><input type="checkbox" id="reduced_motion" name="reduced_motion"> Reduzir animações</label>
      </div>

      <div style="margin-top:16px;display:flex;gap:10px;align-items:center;">
        <button type="submit" style="padding:8px 14px;background:#2563eb;color:#fff;border:0;border-radius:6px;cursor:pointer;">Salvar</button>
        <button type="button" id="settings-reset" style="padding:8px 14px;background:#e5e7eb;border:0;border-radius:6px;cursor:pointer;">Restaurar padrão</button>
        <span id="save-status" style="margin-left:8px;color:#6b7280"></span>
      </div>
    </form>
  </div>
</div>