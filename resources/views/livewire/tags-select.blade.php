<div x-data @tags-update="" data-tags='[]' class="">
    <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()" @keydown.escape="clearSearch()">
        <div class="relative" @keydown.enter.prevent="addTag(textInput)">
            <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline px-4 py-2 mt-2 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
                   placeholder="Dodaj trochę tagów...">
            <div
                :class="[open ? 'block inline-flex items-center cursor-pointer text-sm rounded mt-2 mr-1 text-green-500' : 'hidden']">
                <a
                    @click.prevent="addTag(textInput)">
                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs">Dodaj</span>
                    <i class="fas fa-check "></i>
                </a>
            </div>
            <template x-for="(tag, index) in tags">
                <div class="bg-gray-100 dark:bg-gray-600 inline-flex items-center text-sm rounded mt-2 mr-1">
                    <button
                        @click.prevent="removeTag(index)"
                        x-text="['#' + tag]"
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                            </button>
                </div>
            </template>
        </div>
    </div>
    <script>
        function tagSelect() {
            return {
                open: false,
                textInput: '',
                tags: [],
                init() {
                    this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
                },
                addTag(tag) {
                    tag = tag.trim()
                    if (tag != "" && !this.hasTag(tag)) {
                        this.tags.push(tag)
                    }
                    this.clearSearch()
                    this.$refs.textInput.focus()
                    this.fireTagsUpdateEvent()
                },
                fireTagsUpdateEvent() {
                    this.$el.dispatchEvent(new CustomEvent('tags-update', {
                        detail: {tags: this.tags},
                        bubbles: true,
                    }));
                    @this.call('tagsUpdate', {tags: this.tags});
                },
                hasTag(tag) {
                    var tag = this.tags.find(e => {
                        return e.toLowerCase() === tag.toLowerCase()
                    })
                    return tag != undefined
                },
                removeTag(index) {
                    this.tags.splice(index, 1)
                    this.fireTagsUpdateEvent()
                },
                search(q) {
                    if (q.includes(",")) {
                        q.split(",").forEach(function (val) {
                            this.addTag(val)
                        }, this)
                    }
                    this.toggleSearch()
                },
                clearSearch() {
                    this.textInput = ''
                    this.toggleSearch()
                },
                toggleSearch() {
                    this.open = this.textInput != ''
                }
            }
        }
    </script>
</div>
