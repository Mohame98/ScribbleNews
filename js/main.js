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
  const input = document.querySelector('#s')
  input.placeholder = 'Search...';
  input.autocomplete = "off";
});

// ajax pagination
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

  const resetSearchBtn = createNode("i", null, null, "fa-solid fa-circle-xmark");
  function showOrHideResetButton() {
    const value = searchInput.value.trim();
    if (value) {
      if (!form.contains(resetSearchBtn)) {
        form.append(resetSearchBtn);
        resetSearchBtn.addEventListener("click", function () {
          searchInput.value = '';
          searchInput.focus();
          if (resetSearchBtn) resetSearchBtn.remove();
          const results = document.querySelector('.search-results')
          if (results) results.remove();
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

// ajax search
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.querySelector('#s');
  const modalWrapper = document.querySelector('.search-modal');
  let debounceTimer;
  let resultsContainer = null;

  searchInput.addEventListener('input', function () {
    clearTimeout(debounceTimer);
    const query = this.value.trim();

    if (query.length < 2) {
      if (resultsContainer) {
        resultsContainer.remove();
        resultsContainer = null;
      }
      return;
    }

    debounceTimer = setTimeout(() => {
      fetch(wp_ajax.ajaxurl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
          action: 'live_search',
          keyword: query
        })
      })
      .then(response => response.json())
      .then(data => {
        if (resultsContainer) {
          resultsContainer.remove();
          resultsContainer = null;
        }

        if (data.success && data.data.trim()) {
          resultsContainer = createNode("div", null, modalWrapper, "search-results");
          resultsContainer.innerHTML = data.data;
        }
      })
      .catch(error => {
        console.error('AJAX search error:', error);
        if (resultsContainer) resultsContainer.remove();
        resultsContainer = createNode("div", null, modalWrapper, "search-results");
        resultsContainer.innerHTML = '<p>Something went wrong.</p>';
      });
    }, 300);
  });
});

function handleNav(){
  const popover = document.querySelector(".popover");
  popover.addEventListener("toggle", (event) => {
    const isOpen = event.target.matches(":popover-open");
    isOpen
    ? (document.body.classList.add('no-scroll'))
    : (document.body.classList.remove('no-scroll'))
  });

  window.addEventListener('resize', () => {
    if (window.innerWidth >= 800) popover.hidePopover();
  });
}
handleNav();


