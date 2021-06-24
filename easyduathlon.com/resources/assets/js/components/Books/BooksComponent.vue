<template>
    <section class="member-books">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9 order-actual">
                    <RecentBooks
                            v-if="showRecent"
                            :title="this.vocab[this.locale].title"
                            :recent-books="newDownloads"
                            :downloading="downloading"
                    ></RecentBooks>
                </div>
                <div class="col-lg-4 col-xl-3 order-upgrade">
                    <div class="books-upgrade">
                        <div class="books-upgrade__title">E-books: {{ downloadedBooks }}/{{ totalBooks }}</div>
                        <div class="books-upgrade__img">
                            <svg v-if="plan.slug == 'beginner'" width="115" height="98" viewBox="0 0 115 98" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M80.8883 29.7415L57.5 97.1553L115 29.7415H80.8883Z" fill="#FFE182"/>
                                <path d="M23.7931 0L0 29.7414H34.1116L23.7931 0Z" fill="#FFCD73"/>
                                <path d="M80.8882 29.7414H115L91.2067 0L80.8882 29.7414Z" fill="#FFCD73"/>
                                <path d="M80.8885 29.7414L57.5002 0L34.1118 29.7414H80.8885Z" fill="#FFCD73"/>
                                <path d="M57.4999 0H23.793L34.1115 29.7414L57.4999 0Z" fill="#FFAA64"/>
                                <path d="M91.2069 0H57.5L80.8883 29.7414L91.2069 0Z" fill="#FFE182"/>
                                <path d="M34.1118 29.7415L57.5002 97.1553L80.8885 29.7415H34.1118Z" fill="#FFAA64"/>
                                <path d="M0 29.7415L57.5 97.1553L34.1117 29.7415H0Z" fill="#FF8C5A"/>
                            </svg>
                            <svg v-if="plan.slug == 'basic'" width="115" height="97" viewBox="0 0 115 97" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M115 26.1921L57.5 97L57.1561 96.5777L0 26.1921L25.4905 0H89.5095L115 26.1921Z"
                                      fill="#00E8F2"/>
                                <path d="M115 26.1921L57.5 97V0H89.5095L115 26.1921Z" fill="#00CEF5"/>
                                <path d="M76.7603 26.1335H38.2397L57.1561 0.467095L57.5 0L76.7603 26.1335Z"
                                      fill="#9CFDFF"/>
                                <path d="M89.5086 0L76.4795 26.1335H115L89.5086 0Z" fill="#00F8FE"/>
                                <path d="M25.4914 0L38.5205 26.1335H0L25.4914 0Z" fill="#9CFDFF"/>
                                <path d="M76.4795 26.1333L57.5 96.9998L57.1561 95.7176L38.5205 26.1333H76.4795Z"
                                      fill="#00F8FE"/>
                                <path d="M76.7603 26.1335H76.4795L57.5 97V0L76.7603 26.1335Z" fill="#9CFDFF"/>
                                <path d="M76.7603 26.1335H57.5V0L76.7603 26.1335Z" fill="#00F8FE"/>
                            </svg>
                            <svg v-if="plan.slug == 'pro'" width="115" height="97" viewBox="0 0 115 97" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M57.5 97L0 29.8462H115L57.5 97Z" fill="#CC2E48"/>
                                <path d="M115 29.8461H0L19.8276 0H95.1724L115 29.8461Z" fill="#FC3952"/>
                                <path d="M83.5808 29.8461L95.172 0H19.8271L31.4184 29.8461H83.5808Z" fill="#F76363"/>
                                <path d="M83.2758 29.8461L57.5 0L31.7241 29.8461H83.2758Z" fill="#F49A9A"/>
                                <path d="M31.4189 29.8462L57.5002 97L83.5814 29.8462H31.4189Z" fill="#CB465F"/>
                            </svg>
                        </div>
                        <div class="books-upgrade__plan">{{plan.slug}}</div>
                        <a :href="routes.manage" class="books-upgrade__btn">{{ this.vocab[this.locale].btn }}</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="books-container">
                    <div class="books-container__item" v-for="book in books" :key="book.id">
                        <div class="books-container__img">
                            <img :src="`/storage/${book.img}`" alt="">
                        </div>
                        <div class="books-container__text">{{ book.title }}</div>
                        <a class="books-container__btn" :href="`books/${book.id}`" @mousedown="handleClick(book)">
                            <span class="books-container__btn-arrow">&#129075;</span>
                            <span class="books-container__btn-text">Pdf</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="pagination">
                    <b-pagination-nav :link-gen="linkGen" :number-of-pages="last_page" v-model="currentPage"/>
                </div>
            </div>
        </div>
        <popup-success
                msgText="Download limit reached"
                popup-type="error"
                :show-popup="showPopup"
                @closePopup="showPopup = !showPopup"
        ></popup-success>
    </section>
</template>

<script>


    import vocab from '../../translates/member_area/ebooks';
    import RecentBooks from '../Assets/RecentBooks';

    export default {
        name: "BooksComponent",
        props: {
            props_books_data: {
                type: Object,
                require: true
            },
            totalBooks: {
                type: Number,
                require: true
            },
            availableBooks: {
                type: Number,
                require: true
            },
            routes: {},
            recentBooks: {
                type: Array
            },
            plan: {},
            downloadErrors: {
                type: String
            },
            locale: {
                type: String,
                require: true
            },
        },
        components: {RecentBooks},
        data() {
            return {
                vocab: {},
                books_data: {},
                books: [],
                currentPage: null,
                first_page_url: null,
                last_page: null,
                last_page_url: null,
                next_page_url: null,
                path: null,
                per_page: null,
                prev_page_url: null,
                to: null,
                total: null,
                downloading: false,
                newDownloads: [],
                showPopup: false,
                showRecent:true,
                downloadedBooks:0,
            }
        },
        created() {
            this.vocab = vocab;
            this.newDownloads = [...this.recentBooks];
            this.downloadedBooks = this.availableBooks;
            (
                {
                    data: this.books,
                    current_page: this.currentPage,
                    first_page_url: this.first_page_url,
                    last_page: this.last_page,
                    last_page_url: this.last_page_url,
                    next_page_url: this.next_page_url,
                    path: this.path,
                    per_page: this.per_page,
                    prev_page_url: this.prev_page_url,
                    to: this.to,
                    total: this.total,
                } = this.props_books_data
            );

            if (this.downloadErrors.length>2) {
                this.showPopup = 1;
            }

            this.downloadBooks();
        },

        methods: {
            linkGen(pageNum) {
                return '?page=' + pageNum
            },
            downloadBooks() {
                window.onscroll = () => {
                    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                        console.log(true);
                        // axios
                    } else {
                        console.log(false);
                    }
                }
            },
            handleClick(book){
                if(!this.newDownloads.find(function(element, index, array){ //finding similar elements in slider
                        if(element.book.id === book.id){
                            return true;
                        }
                        return false;
                })) {
                    this.downloadedBooks++;
                if(this.newDownloads.length<5){
                        this.newDownloads.push({book: book, id: this.newDownloads.length + 1, book_id: book.id});
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>
