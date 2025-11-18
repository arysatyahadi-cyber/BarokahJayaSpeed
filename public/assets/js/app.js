
document.addEventListener('DOMContentLoaded', function(){
  // CC modal
  const ccModal = document.getElementById('ccModal');
  document.getElementById('ccToggle').addEventListener('click', function(e){ e.preventDefault(); ccModal.style.display='flex'; });
  document.querySelector('.closeCc').addEventListener('click', function(){ ccModal.style.display='none'; });
  document.getElementById('calcCcBtn').addEventListener('click', async function(){
    let bore = parseFloat(document.getElementById('bore').value) || 0;
    let stroke = parseFloat(document.getElementById('stroke').value) || 0;
    const res = await fetch('/calc-cc', {
      method:'POST', headers:{'Content-Type':'application/json','Accept':'application/json','X-Requested-With':'XMLHttpRequest'}, body: JSON.stringify({bore, stroke, _token: document.querySelector('meta[name=csrf-token]') ? document.querySelector('meta[name=csrf-token]').getAttribute('content') : ''})
    });
    const data = await res.json();
    document.getElementById('ccResult').innerText = 'Per silinder: ' + (data.cc || 0) + ' cc';
  });

  // change photo
  const changeBtn = document.getElementById('changePhotoBtn');
  const photoInput = document.getElementById('photoInput');
  const motorPhoto = document.getElementById('motorPhoto');
  changeBtn.addEventListener('click', ()=> photoInput.click());
  photoInput.addEventListener('change', (e)=>{
    const file = e.target.files[0];
    if (!file) return;
    const url = URL.createObjectURL(file);
    motorPhoto.src = url;
  });

  // booking status update (AJAX)
  document.querySelectorAll('.statusSelect').forEach(s=>{
    s.addEventListener('change', async function(){
      const parent = this.closest('.booking-item');
      const id = parent.getAttribute('data-id');
      const status = this.value;
      try {
        const res = await fetch('/booking/'+id+'/status', {
          method:'POST',
          headers:{'Content-Type':'application/json','X-Requested-With':'XMLHttpRequest'},
          body: JSON.stringify({status, _token: ''})
        });
        const data = await res.json();
        if (!data.success) throw 'error';
        // brief visual feedback
        parent.style.boxShadow = '0 6px 18px rgba(0,0,0,0.6), 0 0 0 3px rgba(255,255,255,0.02)';
        setTimeout(()=> parent.style.boxShadow = '', 1000);
      } catch(err){
        alert('Gagal memperbarui status (skeleton proyek). Jika server aktif, pastikan CSRF token dan route tersedia.');
      }
    });
  });
});
