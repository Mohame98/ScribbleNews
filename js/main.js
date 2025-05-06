function handleModal(){
  const modalBtn = document.querySelector('.search-btn');
  const dialog = document.querySelector('.search-modal');
  const modalWrapper = document.querySelector('.search-modal .modal-nested-wrapper');

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
      modalWrapper.classList.remove("shake");
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

      window.history.pushState(null, '', link);
    });
  }
});

function createNode(type, text, parentNode, className, href) {
  let node = document.createElement(type);
  if (text) node.appendChild(document.createTextNode(text));
  if (className) node.className = className;
  if (parentNode) parentNode.append(node);
  if (type === "img") node.src = text;
  if (href) node.href = href;
  return node;
}

function appendSearchIcon(){
  const searchIcon = createNode("i", null, null, "fa-solid fa-magnifying-glass");
  const form = document.querySelector('.search-modal form');
  form.append(searchIcon);
}
appendSearchIcon();

function resetSearch() {
  const searchInput = document.querySelector('#s');
  const form = document.querySelector('.search-modal form');
  if (!searchInput || !form) return;

  const resetSearchBtn = createNode("i", null, null, "fa-solid fa-xmark");
  function showOrHideResetButton() {
    const value = searchInput.value.trim();
    if (value) {
      if (!form.contains(resetSearchBtn)) {
        form.append(resetSearchBtn);
        resetSearchBtn.addEventListener("click", function () {
          searchInput.value = '';
          searchInput.focus();
          resetSearchBtn.remove();
        }, { once: true });
      }
    } else {
      if (form.contains(resetSearchBtn)) {
        resetSearchBtn.remove();
      }
    }
  }
  showOrHideResetButton();
  searchInput.addEventListener('input', showOrHideResetButton);
}
document.addEventListener("DOMContentLoaded", resetSearch);

function handleSubmit(){
  const form = document.querySelector('.search-modal form');
  const input = document.querySelector('#s');
  const modalWrapper = document.querySelector('.search-modal .modal-nested-wrapper');
  
  form.addEventListener("submit", function(e){
    const value = input.value.trim();
    if (value === "") {
      e.preventDefault();
      modalWrapper.classList.remove("shake"); 
      void modalWrapper.offsetWidth;
      modalWrapper.classList.add("shake");
    }
  })
}
handleSubmit();