function toggleAnswer(element) {
    const isActive = element.classList.contains('active');
    document.querySelectorAll('.faq-container ul li').forEach(li => {
        li.classList.remove('active');
        li.querySelector('.answer').classList.remove('open');
    });
    if (!isActive) {
        element.classList.add('active');
        element.querySelector('.answer').classList.add('open');
    }
}