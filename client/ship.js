var Ship = function(type){
    this.type = type;
    this.readFile();
};

Ship.prototype.readFile = function(){
    var self = this;
    Utils.readTextFile('assets/ships/ship-'+this.type+'.json', function(text){
        self.shipJson = JSON.parse(text);
        console.log(self.shipJson);
        self.getTiles();
    });
};

Ship.prototype.getTiles = function(){
    for( var i = 0; i < this.shipJson.tilesets.length; i++ ){
        console.log(this.shipJson.tilesets[i].name);
        game.load.image(this.shipJson.tilesets[i].name, 'assets/tiles/'+this.shipJson.tilesets[i].name+'.png');
    }
    // Lancer le chargement de la map
    this.loadTilemap();

};

Ship.prototype.loadTilemap = function(){
    var self = this;
    console.log('loadTiles');
    console.log(this.type);
    //this.getTiles();
    var shipMap = game.load.tilemap(this.type,'assets/ships/ship-'+this.type+'.json',null,Phaser.Tilemap.TILED_JSON);
    console.log(shipMap);
    shipMap.onLoadComplete.addOnce(function(){
        // Créer la map
        self.create();
    });
};

Ship.prototype.create = function(){
    var map = game.add.tilemap(this.type);
    console.log(map);
    for( var i = 0; i < this.shipJson.tilesets.length; i++ ){
        map.addTilesetImage(this.shipJson.tilesets[i].name);
    }
    var layers = [];
    for( var l = 0; l < this.shipJson.layers.length; l++ ){
        console.log('layers');
        console.log(this.shipJson.layers[l].name);
        layers[l] = map.createLayer(this.shipJson.layers[l].name);
        layers[l].resizeWorld();
    }

};