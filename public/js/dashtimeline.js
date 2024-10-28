const music = document.querySelector("#inputMusic");
const musicId = document.querySelector("#music_id");
const musicTitle = document.querySelector("#title_music");
const musicCover = document.querySelector("#cover_music");
const musicArtist = document.querySelector("#artist_music");
const musicStreamurl = document.querySelector("#streamurl_music");
const listmusic = document.querySelector("#contentsmusic");
const divmusic = document.querySelector("#listMusic");

music.addEventListener("keyup", checkMusic);
let hiddenList = true;
function checkMusic() {
    let text = " ";
    listmusic.innerHTML = "";
    if (music.value) {
        setTimeout(() => {
            fetch(
                "https://musicapi.x007.workers.dev/search?searchEngine=seevn&q=" +
                    music.value
            )
                .then((response) => response.json())
                .then((datas) => {
                    datas.response.forEach((item, index) => {
                        if (hiddenList) {
                            divmusic.classList.remove("hidden");
                            hiddenList = false;
                        }
                        let li = document.createElement("li");
                        li.classList.add(
                            "flex",
                            "gap-4",
                            "items-center",
                            "mb-3",
                            "p-2",
                            "rounded"
                        );
                        li.setAttribute("id", item.id);
                        let img = document.createElement("img");
                        img.src = item.img;
                        img.classList.add(
                            "aspect-square",
                            "h-14",
                            "rounded-full"
                        );
                        img.addEventListener("click", () => {
                            // Menghapus kelas bg-gray-500 dari semua elemen <li>
                            document.querySelectorAll("li").forEach((el) => {
                                el.classList.remove("bg-zinc-800");
                            });
                            // Menambahkan kelas bg-gray-500 ke elemen yang diklik
                            li.classList.add("bg-zinc-800");
                            // document.querySelector(`#${item.id}`).classList.add('bg-gray-500');
                            musicId.value = item.id;
                            musicTitle.value = item.title;
                            musicCover.value = item.img;
                            musicArtist.value = "Tiktok";
                            playMusic(item.id, item.title); // Memanggil fungsi playMusic dengan id lagu
                        });
                        let p = document.createElement("p");
                        p.textContent = item.title;
                        li.appendChild(img);
                        li.appendChild(p);
                        listmusic.appendChild(li);
                    });
                    // listmusic.innerHTML = text;
                });
        }, 1000);
    } else {
        divmusic.classList.add("hidden");
        hiddenList = true;
        musicId.value = "creator_audio";
    }
}

let currentAudio = null; // Simpan referensi ke audio yang sedang diputar

function playMusic(url, title) {
    if (currentAudio !== null) {
        currentAudio.pause(); // Jika ada audio yang sedang diputar, hentikan
    }

    // Buat elemen audio baru
    let audio = document.createElement("audio");
    audio.src = "https://musicapi.x007.workers.dev/fetch?id=" + url;
    musicStreamurl.value = audio.src;
    audio.preload = "none"; // Mengatur preload ke 'none'
    // Tambahkan judul lagu sebagai label
    audio.setAttribute("aria-label", title);
    // Play audio
    audio
        .play()
        .then(() => {
            console.log("Lagu dimulai:", title);
        })
        .catch((error) => {
            console.error("Gagal memainkan lagu:", error);
        });

    currentAudio = audio; // Tetapkan audio saat ini ke audio yang baru dibuat
}
var control = document.getElementById("dropzone-file");
control.addEventListener(
    "change",
    function (event) {
        // When the control has changed, there are new files
        var files = control.files;
        for (var i = 0; i < files.length; i++) {
            // if(files[i].type.split("/")[0])
            if (files[i].type.split("/")[0] == "video") {
                document.getElementById("mutedBox").classList.remove("hidden");
            } else {
                document.getElementById("mutedBox").classList.add("hidden");
            }
        }
    },
    false
);
