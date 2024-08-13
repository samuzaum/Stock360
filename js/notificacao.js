
document.querySelectorAll('.product .buy-button').forEach(button => {
  button.addEventListener('click', () => {
    const notification = document.getElementById('notification');
    notification.classList.add('show');
    notification.classList.remove('hidden');
    
    setTimeout(() => {
      notification.classList.add('hidden');
      notification.classList.remove('show');
    }, 3000); 
  });
});
