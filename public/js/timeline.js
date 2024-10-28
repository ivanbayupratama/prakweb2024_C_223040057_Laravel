function Copy(code) {
    var Url = `${code}`;
    var copyText = Url;
    navigator.clipboard.writeText(copyText);
    alert("Copied!");
}
document.addEventListener("DOMContentLoaded", function () {
    // VARIABLE
    // SNAP
    const snaps = document.querySelectorAll(".snap-start");
    // TAG AUDIO
    var audioElements = document.querySelectorAll("audio");
    // TAG PLAYBTN
    var playbtn = document.getElementById("playBTN");
    // TAG LOADING
    var loading = document.getElementById("loading");
    // CONTENT SNAP
    const container = document.querySelector(".content-snap");
    // SECTION START
    const sections = document.querySelectorAll(".snap-start");

    // Fungsi untuk menentukan elemen yang aktif
    function setActiveSnap() {
        // Dapatkan posisi scroll vertikal saat ini
        const scrollY = window.scrollY || window.pageYOffset;

        // Loop melalui setiap elemen snap
        snaps.forEach((snap) => {
            // Periksa apakah elemen snap sedang aktif
            const rect = snap.getBoundingClientRect();
            const isInViewport =
                rect.top <= window.innerHeight / 2 &&
                rect.bottom >= window.innerHeight / 2;

            // Tambahkan atau hapus kelas 'active' sesuai dengan statusnya
            if (isInViewport) {
                snap.classList.add("active");
            } else {
                snap.classList.remove("active");
            }
        });
    }
    // CEK AKTIF DLU
    setActiveSnap();
    document
        .querySelector(".content-snap")
        .addEventListener("scroll", setActiveSnap);

    // Fungsi untuk mencari elemen dengan ID di dalam elemen yang aktif
    function findActiveElementWithID(id) {
        // Dapatkan elemen snap yang aktif
        const activeSnap = document.querySelector(".snap-start.active");

        // Periksa apakah ada elemen yang aktif
        if (activeSnap) {
            // Cari elemen dengan ID di dalam elemen yang aktif
            const elementWithID = activeSnap.querySelector(`#${id}`);

            // Kembalikan elemen jika ditemukan, atau null jika tidak ditemukan
            return elementWithID;
        }

        return null;
    }
    // FIND TAG VIDEO
    function findActiveElementWithTag(tag) {
        // Dapatkan elemen snap yang aktif
        const activeSnap = document.querySelector(".snap-start.active");

        // Periksa apakah ada elemen yang aktif
        if (activeSnap) {
            // Cari elemen dengan ID di dalam elemen yang aktif
            const elementWithID = activeSnap.querySelector(`${tag}`);

            // Kembalikan elemen jika ditemukan, atau null jika tidak ditemukan
            return elementWithID;
        }

        return null;
    }

    // LOADING
    function btnLoading() {
        findActiveElementWithID("loading").classList.remove("hidden");
    }

    // LOADING
    function rebtnLoading() {
        findActiveElementWithID("loading").classList.add("hidden");
    }

    // PLAY BTN
    function btnPlay() {
        findActiveElementWithID("playBTN").classList.remove("hidden");
    }

    // PLAY BTN
    function rebtnPlay() {
        findActiveElementWithID("playBTN").classList.add("hidden");
    }

    // Event listener untuk mendengarkan scroll pada container
    container.addEventListener("scroll", () => {
        // Periksa apakah modal muncul
        if (modalTampil()) {
            // Tidak perbolehkan scrolling jika modal terbuka
            aturScroll(false);
            return;
        }
        // Memperbarui kelas active pada elemen section sesuai dengan snap yang aktif
        sections.forEach((section, index) => {
            const video = section.querySelector("video");
            const audio = section.querySelector("audio");
            if (section.classList.contains("active")) {
                btnLoading();
                if (video) {
                    video.play();
                    if (video.readyState < 3) {
                        rebtnLoading();
                    }
                    video.addEventListener("timeupdate", handleScroll);
                } else {
                    if (audio) {
                        audio.play();
                        if (audio.readyState < 3) {
                            rebtnLoading();
                        }
                        audio.addEventListener("timeupdate", handleScroll);
                    } else {
                        rebtnLoading();
                    }
                }
                rebtnPlay();
            } else {
                // Hentikan autoplay untuk video dalam snap yang tidak aktif
                if (video) {
                    video.pause();
                    video.removeEventListener("timeupdate", handleScroll);
                }
                // Hentikan autoplay untuk audio dalam snap yang tidak aktif
                const audio = section.querySelector("audio");
                if (audio) {
                    audio.pause();
                    audio.removeEventListener("timeupdate", handleScroll);
                }
            }
        });
    });
    // Event listener untuk mendengarkan scroll pada container
    // Fungsi untuk mengatur scroll pada container
    function aturScroll(bolehScroll) {
        const container = document.body;
        container.style.overflow = bolehScroll ? "auto" : "hidden";
    }

    // Event listener untuk mendengarkan klik pada container
    container.addEventListener("click", () => {
        // Periksa apakah modal muncul
        if (modalTampil()) {
            // Tidak perbolehkan scrolling jika modal terbuka
            aturScroll(false);
            return;
        }

        // Memperbarui kelas active pada elemen section sesuai dengan snap yang aktif
        sections.forEach((section, index) => {
            const video = section.querySelector("video");
            const audio = section.querySelector("audio");
            if (section.classList.contains("active")) {
                if (
                    findActiveElementWithID("playBTN").classList.contains(
                        "hidden"
                    )
                ) {
                    btnPlay();
                    if (video) {
                        video.pause();
                        video.removeEventListener("timeupdate", handleScroll);
                    }
                    // Hentikan autoplay untuk audio dalam snap yang tidak aktif
                    if (audio) {
                        audio.pause();
                        audio.removeEventListener("timeupdate", handleScroll);
                    }
                } else {
                    rebtnPlay();
                    aturScroll(false);
                    // Aktifkan autoplay untuk video dalam snap yang aktif
                    if (video) {
                        video.play();
                        if (video.readyState < 3) {
                            rebtnLoading();
                        }
                        video.addEventListener("timeupdate", handleScroll);
                    } else {
                        if (audio) {
                            audio.play();
                            if (audio.readyState < 3) {
                                rebtnLoading();
                            }
                            audio.addEventListener("timeupdate", handleScroll);
                        }
                    }
                }
            }
        });
    });
    // Fungsi handleScroll
    function handleScroll(event) {
        loading.classList.add("hidden");
        const video = event.currentTarget;
        // debug
        // console.log(Math.floor(video.duration));
        // console.log(Math.floor(video.currentTime));
        // console.log(
        //     "\n" + Math.floor(video.currentTime) == Math.floor(video.duration)
        // );
        // Cek jika waktu video lebih dari 30 detik
        handleScrolla(video.currentTime, video.duration);
        const audio = document.querySelector(".active audio");

        if (video.readyState <= 3) {
            btnLoading();
            // Jika video masih loading, pause audio jika ada
            if (audio) {
                audio.pause();
            }
            return; // Berhenti eksekusi jika video masih loading
        } else {
            if (video.readyState > 3) {
                rebtnLoading();
                if (audio) {
                    audio.play();
                }
            } else {
                btnLoading();
            }
        }

        if (
            video.currentTime >= 30 ||
            Math.floor(video.currentTime) == Math.floor(video.duration)
        ) {
            // Reset waktu video dan audio ke 0
            video.currentTime = 0;

            if (audio) {
                audio.currentTime = 0;
            }
        }

        if (!document.hasFocus()) {
            // Jika dokumen tidak memiliki fokus, pause video dan audio jika ada
            btnPlay();
            video.pause();

            if (audio) {
                audio.pause();
            }
        } else {
            // Jika dokumen memiliki fokus
            rebtnPlay();
            video.play();

            if (audio) {
                audio.play();
            }
        }
    }

    audioElements.forEach(function (audioElement) {
        audioElement.volume = 0.4;
    });

    function handleScrolla(detik, total) {
        var progress = document.querySelectorAll(".progressBar");
        var windowHeight = container.clientHeight;
        progress.forEach(function (progressElement) {
            var progressHeight = progressElement.clientHeight;
            var progressClientRect =
                progressElement.getBoundingClientRect().top;
            if (
                progressClientRect <= windowHeight - progressHeight * 0.5 &&
                progressClientRect >= 0 - progressHeight * 0.5 &&
                !progressElement.readyState < 3 // Check if not still loading
            ) {
                // console.log(detik);
                detik = Math.min(detik, 30);
                // Menghitung persentase
                if (total >= 30) {
                    const persentase = (detik / 30) * 100;
                    // return Math.floor(persentase);
                    progressElement.style.width = persentase + "%";
                } else {
                    const persentase = (detik / total) * 100;
                    // return Math.floor(persentase);
                    progressElement.style.width = persentase + "%";
                }
            }
        });
    }

    function toggleMedia() {
        // Periksa apakah modal muncul
        if (modalTampil()) return;

        var windowHeight = awa.clientHeight;
        var mediaElements = document.querySelectorAll("video, audio");

        mediaElements.forEach(function (mediaElement) {
            var mediaHeight = mediaElement.clientHeight;
            var mediaClientRect = mediaElement.getBoundingClientRect().top;

            if (
                mediaClientRect <= windowHeight - mediaHeight * 0.5 &&
                mediaClientRect >= 0 - mediaHeight * 0.5 &&
                !mediaElement.readyState < 3 // Check if not still loading
            ) {
                if (mediaElement.paused) {
                    mediaElement.play();
                    mediaElement.addEventListener("timeupdate", function () {
                        if (mediaElement.currentTime > 30) {
                            mediaElement.currentTime = 0;
                        }
                        // handleScroll(mediaElement.currentTime);
                    });
                    playbtn.classList.add("hidden"); // Sembunyikan tombol play saat media diputar
                } else {
                    mediaElement.pause();
                    playbtn.classList.remove("hidden"); // Tampilkan tombol play saat media dijeda
                }
            }
        });
    }

    // Fungsi untuk memeriksa apakah modal tampil
    function modalTampil() {
        // Ganti dengan selektor modal yang sesuai
        var modal = document.querySelector(".modal");
        return modal && modal.getAttribute("role") === "dialog";
    }
});
