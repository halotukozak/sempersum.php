<div x-data @tags-update="" data-tags='[]' class="">
    <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()" @keydown.escape="clearSearch()">
        <div class="relative" @keydown.enter.prevent="addTag(textInput)">
            <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline px-4 py-2 mt-2 "
                   placeholder="Dodaj trochę tagów...">
            <div :class="[open ? 'block inline-flex items-center cursor-pointer text-sm rounded mt-2 mr-1 text-gray-700 hover:text-green-500' : 'hidden']">
                <a
                    @click.prevent="addTag(textInput)">
                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs">Dodaj</span>
                    <i class="fas fa-check "></i>
                </a>
            </div>
            <template x-for="(tag, index) in tags">
                <div class="bg-blue-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
                    <button @click.prevent="removeTag(index)"
                            class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                        <i class="fas fa-times"></i>
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
