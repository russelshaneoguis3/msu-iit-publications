const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});


// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})


window.addEventListener('resize', function() {
    const sidebar = document.getElementById('sidebar');
    
    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');  // Add the hide class if window width is less than 768px
    } else {
        sidebar.classList.remove('hide');  // Remove the hide class if window width is greater than or equal to 768px
    }
});

// Run this on page load to check the initial window size
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    
    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');
    }
});
