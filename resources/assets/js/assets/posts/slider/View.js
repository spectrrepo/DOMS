import {viewRacourse} from '../../lib/tpl';

class View {
    /**
     * @param {*} img 
     * @param {*} variant 
     */
    constructor(img, variant){
        this.img = img; 
        this.variant = variant; 
    }
    
    static render(imgArray){
        viewRacourse(this.img, this.variant);
    }

    static visible(){

    }
}
