function handleModal(){
  const modalBtn = document.querySelector('.search-btn');
  const dialog = document.querySelector('.search-modal');

  modalBtn.addEventListener('click', function() {
    dialog.showModal();
  });

  dialog.addEventListener('click', function(event){
    if(event.target === dialog) dialog.close(); 
  });

  dialog.addEventListener('toggle', function(event){
    const isOpen = event.target.matches('dialog:open');
    if (isOpen) {
      document.body.classList.add('no-scroll');
      requestAnimationFrame(() => {
        dialog.classList.add("show");
      });
    } else {
      document.body.classList.remove('no-scroll');
      dialog.classList.remove("show");
    }
  });
}
handleModal();

document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('s').placeholder = 'Search...';
});

document.addEventListener('click', function (e) {
  if (e.target.closest('.pagination a')) {
    e.preventDefault();
    const link = e.target.closest('a').getAttribute('href');

    fetch(link, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(res => res.text())
    .then(html => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, 'text/html');
      const newPosts = doc.querySelector('#ajax-request').innerHTML;
      const newPagination = doc.querySelector('.pagination').innerHTML;

      document.querySelector('#ajax-request').innerHTML = newPosts;
      document.querySelector('.pagination').innerHTML = newPagination;

      window.history.pushState(null, '', link); // update URL
    });
  }
});