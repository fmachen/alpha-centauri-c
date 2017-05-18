var Ship = function (type) {
    this.type = type;
    this.layersCollision = [];
    this.readFile();
    this.spawns = [];
};

Ship.prototype.readFile = function () {
    var self = this;
    Utils.readTextFile('assets/ships/ship-' + this.type + '.json', function (text) {
        self.shipJson = JSON.parse(text);
        console.log(self.shipJson);
        self.getTiles();
    });
};

Ship.prototype.getTiles = function () {
    for (var i = 0; i < this.shipJson.tilesets.length; i++) {
        console.log(this.shipJson.tilesets[i].name);
        game.load.image(this.shipJson.tilesets[i].name, 'assets/tiles/' + this.shipJson.tilesets[i].name + '.png');
    }
    // Lancer le chargement de la map
    this.loadTilemap();

};

Ship.prototype.loadTilemap = function () {
    var self = this;
    console.log('loadTiles');
    console.log(this.type);
    //this.getTiles();
    var shipMap = game.load.tilemap(this.type, 'assets/ships/ship-' + this.type + '.json', null, Phaser.Tilemap.TILED_JSON);
    console.log(shipMap);
    shipMap.onLoadComplete.addOnce(function () {
        // Créer la map
        //self.create();
    });
};

Ship.prototype.create = function () {
    var self = this;
    this.map = game.add.tilemap(this.type);
    for (var i = 0; i < this.shipJson.tilesets.length; i++) {
        this.map.addTilesetImage(this.shipJson.tilesets[i].name);
    }
    this.layers = [];
    for (var l = 0; l < this.shipJson.layers.length; l++) {
        console.log(this.shipJson.layers[l]);
        if (this.shipJson.layers[l].type == 'tilelayer') {
            this.layers[l] = this.map.createLayer(this.shipJson.layers[l].name);
            this.layers[l].resizeWorld();
            this.layers[l].name = this.shipJson.layers[l].name;
        }

        if (this.shipJson.layers[l].properties != undefined) {
            self.applyProperties(l);
        }
        if( this.shipJson.layers[l].name == "spawn"){
            self.setSpawn(l);
        }
        console.log(this.shipJson.layers[l].name);
    }
    console.log(this.map.currentLayer);
};

Ship.prototype.applyProperties = function (layerIndex) {
    console.log('Ship apply properties');
    console.log(this.shipJson.layers[layerIndex].properties.collision);
    console.log(this.layers[layerIndex]);
    if (this.shipJson.layers[layerIndex].properties.collision != undefined && this.shipJson.layers[layerIndex].properties.collision) {

        this.layers[layerIndex].collision = true;
        //this.layers[layerIndex].debug=true;
        this.map.setCollisionBetween(1, 12, true, this.layers[layerIndex].name, true);
    }
}

Ship.prototype.getLayersCollision = function(){
    var layers = [];
    for( var i in this.layers ){
        if( this.layers[i].collision != undefined && this.layers[i].collision ){
            layers.push(this.layers[i]);
        }
    }
    return layers;
}

Ship.prototype.setSpawn = function (layerIndex) {
    for( var i in this.shipJson.layers[layerIndex].objects)  {
        this.spawns.push({
            x: this.shipJson.layers[layerIndex].objects[i].x,
            y: this.shipJson.layers[layerIndex].objects[i].y
        });
    }
}
    

