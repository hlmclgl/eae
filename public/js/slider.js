document.addEventListener('DOMContentLoaded', function() {
    let currentSlide = 0;
    const slides = [
        {
            type: 'video',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/tel-kablo-kanali_8365644459.webm',
            title: 'Tel Kablo Kanalı',
            subtitle: 'Yeni Ürün'
        },
        {
            type: 'video',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/gecmeli-kablo-kanal-sistemleri_6078425445.mp4',
            title: 'Geçmeli Kablo Kanal Sistemleri',
            subtitle: 'Kolay Montaj'
        },
        {
            type: 'image',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/etkilesimli-web-sitemiz-yayinda_1382206493.webp',
            title: 'Etkileşimli Web Sitemiz Yayında',
            subtitle: "EAE'nin tüm çözümleri bir arada"
        },
        {
            type: 'video',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/e-line-rsp-kutu-profil-sistemleri_5106243148.mp4',
            title: 'E-Line RSP Kutu Profil Sistemleri',
            subtitle: 'Yenilikçi Çözüm'
        },
        {
            type: 'image',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/eae-bim_2325350248.webp',
            title: 'EAE BIM',
            subtitle: 'Yapı Bilgi Modellemesi'
        },
        {
            type: 'video',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/cevreci-urunler_6397595350.webm',
            title: 'Çevreci Ürünler',
            subtitle: '#sürdürülebilirgelecek'
        },
        {
            type: 'video',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/e-line-ccr-busbar_2503731837.mp4',
            title: 'E-Line CCR Busbar',
            subtitle: '600A - 6300A'
        },
        {
            type: 'image',
            source: 'https://eae-dokuman.s3.eu-west-1.amazonaws.com/sliders/easy-busbar-cloud_8284537104.webp',
            title: 'Easy Busbar Cloud',
            subtitle: 'ŞİMDİ YAYINDA!'
        }
    ];

    const heroSection = document.querySelector('.hero-section');

    function updateSlide(index) {
        currentSlide = index;
        const slide = slides[index];
        
        heroSection.innerHTML = `
            ${slide.type === 'video' ? 
                `<video src="${slide.source}" autoplay loop muted playsinline></video>` : 
                `<img src="${slide.source}" alt="${slide.title}">`
            }
            <div class="hero-content">
                <h1>${slide.title}</h1>
                <span class="subtitle">${slide.subtitle}</span>
                <div class="d-flex gap-3 pt-4">
                    <button type="button" class="btn-standard-secondary">Detay</button>
                    ${slide.type === 'video' ? '<button type="button" class="btn-standard-primary">Video</button>' : ''}
                </div>
            </div>
            <div class="slider-arrows">
                <div class="slider-arrow prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="slider-arrow next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
            <div class="dot-indicators">
                ${Array(slides.length).fill().map((_, i) => 
                    `<span class="dot ${i === index ? 'active' : ''}"></span>`
                ).join('')}
            </div>
        `;

        document.querySelectorAll('.dot').forEach((dot, i) => {
            dot.addEventListener('click', () => updateSlide(i));
        });
        
        document.querySelector('.slider-arrow.prev').addEventListener('click', prevSlide);
        document.querySelector('.slider-arrow.next').addEventListener('click', nextSlide);
    }

    function nextSlide() {
        updateSlide((currentSlide + 1) % slides.length);
    }

    function prevSlide() {
        updateSlide((currentSlide - 1 + slides.length) % slides.length);
    }

    updateSlide(0);
    setInterval(nextSlide, 8000);
}); 