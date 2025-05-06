function handleModal(){
  const modalBtn = document.querySelector('.search-btn')
  const dialog = document.querySelector('.search-modal');

  modalBtn.addEventListener('click', function() {
    modalBtn.style.color = 'red'
    dialog.showModal();
  });

  dialog.addEventListener('click', function(event){
    if(event.target === dialog) {
      dialog.close(); 
    }   
  });

  dialog.addEventListener('toggle', function(event){
    const isOpen = event.target.matches('dialog:open');
    if (isOpen) {
      document.body.classList.add('no-scroll');
    } else {
      document.body.classList.remove('no-scroll');
    }
  });
}
// handleModal();