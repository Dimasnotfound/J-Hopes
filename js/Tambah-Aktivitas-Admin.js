function selectOption(pageNumber) {
    // Reset all options to remove active class
    var options = document.querySelectorAll('.option');
    options.forEach(function(option) {
      option.classList.remove('active');
    });
  
    // Add active class to the selected option
    var selectedOption = document.querySelector('.option:nth-child(' + pageNumber + ')');
    selectedOption.classList.add('active');
  }

  function changePage(page) {
    // Reset active class for all links
    var links = document.querySelectorAll('.pagination a');
    links.forEach(function(link) {
      link.classList.remove('active');
    });
  
    // Set active class for the clicked link
    if (page !== 'last') {
      var clickedLink = document.querySelector('.pagination a:nth-child(' + page + ')');
      clickedLink.classList.add('active');
    }
  }

  document.getElementById('editableCard').addEventListener('click', function() {
    // Add your logic for the edit action here
    alert('Card clicked! Implement your edit action here.');
});

    document.getElementById('btnTambah').addEventListener('click', function () {
        // Tampilkan popup atau navigasikan ke halaman tambahkandataanak.html
        // Misalnya, dengan menggunakan window.location.href atau library pop-up/modal
        // Contoh menggunakan window.location.href:
        window.location.href = 'tambahdatapengurus.html';
    });

    function kembaliKeAktivitasPanti() {
      window.location.href = 'aktivitas.html';
  }
  