<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="well well-sm">
            <div class="form-group">
                <div class="input-group input-group-md">
                    <div class="icon-addon addon-md">
                        <input type="text" placeholder="Search..." class="form-control" v-model="query">
                    </div>
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button" @click="search()" v-if="!loading"><span
                                            class="glyphicon glyphicon-search"></span>
                                </button>
                                <button class="btn btn-default" type="button" disabled="disabled" v-if="loading">Searching...</button>
                        </span>
                </div>
            </div>
            <div class="alert alert-danger" role="alert" v-if="error">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                @{{ error }}
            </div>
            <div id="games" class="row">
                <div class="grid-item col-md-8 col-md-offset-2" v-for="game in games">
                    <a class="grid-link" href="/dashboard/game-detail/@{{ game.id }}) }}">
                        <div class="thumbnail">
                            <img class="thumbnail grid-img" :src="game.image" alt="@{{ game.title }}"/>
                            <div class="caption">
                                <h3 class="group inner list-group-item-heading">@{{ game.title }}</h3>
                                <p class="group inner list-group-item-text">@{{ game.description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>