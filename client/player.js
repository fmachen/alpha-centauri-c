var Player = function(){
    this.create();
};

Player.prototype.create = function(){
    console.log('new player');
    this.entity = game.add.sprite(0, 0, 'characters');
    game.physics.arcade.enable(this.entity);
    this.entity.body.collideWorldBounds = true;
    this.setAnimation();
    return this.entity;
};

Player.prototype.setAnimation = function(){
    this.entity.animations.add('up', [36, 37, 38], 10, true);
    this.entity.animations.add('down', [0, 1, 2], 10, true);
    this.entity.animations.add('left', [12, 13, 14], 10, true);
    this.entity.animations.add('right', [24, 25, 26], 10, true);
}

Player.prototype.setPosition = function(x,y){
    this.entity.x = x;
    this.entity.y = y;
}

Player.prototype.spawn = function(spawnArray){
    var spawn = spawnArray[game.rnd.between(0,spawnArray.length -1)];
    console.log(spawn);
    this.setPosition(spawn.x,spawn.y);
}