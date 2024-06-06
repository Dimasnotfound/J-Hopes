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

  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('editableCard').addEventListener('click', function() {
      // Add your logic for the edit action here
      alert('Card clicked! Implement your edit action here.');
    });
  
  });

// Define the function to show detail based on the selected option
function showDetail(option) {
  if (option === 'Detail Panti') {
      // Redirect to detailpanti.html
      window.location.href = 'detailpanti.html';
  } else if (option === 'Detail Anggota') {
      // Redirect to detailanggota.html
      window.location.href = 'detailanggota.html';
  }
}

document.getElementById('btnAktivitas').addEventListener('click', function () {
  window.location.href = 'aktivitas.html';
});