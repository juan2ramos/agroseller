<section class="Step Step-3 Forms">
    <p>Si no deseas publicar una oferta para tu producto, puedes omitir este paso</p>
    <div class="Button">OMITIR</div>

    <article>
        <p>1. Valor de la oferta - valor actual $200.000</p>
        <label for="offer-price">
            <input type="number" name="offer-price" id="offer-price" value="{{ old('offer-price') }}">
            <span>Valor oferta</span>
            <em>$</em>
        </label>
    </article>


    <article class="Step-3Offers">
        <p>2. Fechas de inicio y limite de la oferta</p>
        <div class="row middle  ">
            <label for="offer-on" class="col-4 ">
                <input type="text" class="datetimepicker_mask" id="offer-on" name="offer-on"
                       value="{{ old('offer-on') }}">
                <span>Fecha inicio</span>
                <em>
                    <svg width="18px" height="20px" viewBox="0 0 18 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                        <!-- Generator: Sketch 3.5.2 (25235) - http://www.bohemiancoding.com/sketch -->
                        <title>Shape</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                            <g id="Paso-3" sketch:type="MSArtboardGroup" transform="translate(-531.000000, -577.000000)" fill="#C5C5C5">
                                <path d="M537.431104,592.98572 L539.425734,592.98572 L539.425734,590.991091 L537.431104,590.991091 L537.431104,592.98572 L537.431104,592.98572 Z M534.443565,592.98572 L536.438194,592.98572 L536.438194,590.991091 L534.443565,590.991091 L534.443565,592.98572 L534.443565,592.98572 Z M543.405958,589.868985 L545.400587,589.868985 L545.400587,587.874355 L543.405958,587.874355 L543.405958,589.868985 L543.405958,589.868985 Z M540.418644,589.868985 L542.413273,589.868985 L542.413273,587.874355 L540.418644,587.874355 L540.418644,589.868985 L540.418644,589.868985 Z M537.431104,589.868985 L539.425734,589.868985 L539.425734,587.874355 L537.431104,587.874355 L537.431104,589.868985 L537.431104,589.868985 Z M534.443565,589.868985 L536.438194,589.868985 L536.438194,587.874355 L534.443565,587.874355 L534.443565,589.868985 L534.443565,589.868985 Z M543.405958,586.752023 L545.400587,586.752023 L545.400587,584.757394 L543.405958,584.757394 L543.405958,586.752023 L543.405958,586.752023 Z M540.418644,586.752023 L542.413273,586.752023 L542.413273,584.757394 L540.418644,584.757394 L540.418644,586.752023 L540.418644,586.752023 Z M537.431104,586.752023 L539.425734,586.752023 L539.425734,584.757394 L537.431104,584.757394 L537.431104,586.752023 L537.431104,586.752023 Z M534.443565,586.752023 L536.438194,586.752023 L536.438194,584.757394 L534.443565,584.757394 L534.443565,586.752023 L534.443565,586.752023 Z M531.903467,595.638977 L548.096307,595.638977 L548.096307,582.4723 L531.903467,582.4723 L531.903467,595.638977 L531.903467,595.638977 Z M545.010741,578.542896 L545.010741,577 L544.107274,577 L544.107274,578.542896 L535.8925,578.542896 L535.8925,577 L534.989033,577 L534.989033,578.542896 L531,578.542896 L531,596.54267 L549,596.54267 L549,578.542896 L545.010741,578.542896 L545.010741,578.542896 Z" id="Shape" sketch:type="MSShapeGroup"></path>
                            </g>
                        </g>
                    </svg>
                </em>
            </label>
            <label for="offer-off" class="col-4 ">
                <input type="text" class="datetimepicker_mask" id="offer-off" name="offer-off"
                       value="{{ old('offer-off') }}">
                <span>Fecha cierre</span>
                <em>
                    <svg width="18px" height="20px" viewBox="0 0 18 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                        <!-- Generator: Sketch 3.5.2 (25235) - http://www.bohemiancoding.com/sketch -->
                        <title>Shape</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                            <g id="Paso-3" sketch:type="MSArtboardGroup" transform="translate(-531.000000, -577.000000)" fill="#C5C5C5">
                                <path d="M537.431104,592.98572 L539.425734,592.98572 L539.425734,590.991091 L537.431104,590.991091 L537.431104,592.98572 L537.431104,592.98572 Z M534.443565,592.98572 L536.438194,592.98572 L536.438194,590.991091 L534.443565,590.991091 L534.443565,592.98572 L534.443565,592.98572 Z M543.405958,589.868985 L545.400587,589.868985 L545.400587,587.874355 L543.405958,587.874355 L543.405958,589.868985 L543.405958,589.868985 Z M540.418644,589.868985 L542.413273,589.868985 L542.413273,587.874355 L540.418644,587.874355 L540.418644,589.868985 L540.418644,589.868985 Z M537.431104,589.868985 L539.425734,589.868985 L539.425734,587.874355 L537.431104,587.874355 L537.431104,589.868985 L537.431104,589.868985 Z M534.443565,589.868985 L536.438194,589.868985 L536.438194,587.874355 L534.443565,587.874355 L534.443565,589.868985 L534.443565,589.868985 Z M543.405958,586.752023 L545.400587,586.752023 L545.400587,584.757394 L543.405958,584.757394 L543.405958,586.752023 L543.405958,586.752023 Z M540.418644,586.752023 L542.413273,586.752023 L542.413273,584.757394 L540.418644,584.757394 L540.418644,586.752023 L540.418644,586.752023 Z M537.431104,586.752023 L539.425734,586.752023 L539.425734,584.757394 L537.431104,584.757394 L537.431104,586.752023 L537.431104,586.752023 Z M534.443565,586.752023 L536.438194,586.752023 L536.438194,584.757394 L534.443565,584.757394 L534.443565,586.752023 L534.443565,586.752023 Z M531.903467,595.638977 L548.096307,595.638977 L548.096307,582.4723 L531.903467,582.4723 L531.903467,595.638977 L531.903467,595.638977 Z M545.010741,578.542896 L545.010741,577 L544.107274,577 L544.107274,578.542896 L535.8925,578.542896 L535.8925,577 L534.989033,577 L534.989033,578.542896 L531,578.542896 L531,596.54267 L549,596.54267 L549,578.542896 L545.010741,578.542896 L545.010741,578.542896 Z" id="Shape" sketch:type="MSShapeGroup"></path>
                            </g>
                        </g>
                    </svg>
                </em>
            </label>
        </div>
    </article>
    <article>
        <p>3. Descripción de la oferta</p>

        <div id="toolbarOffer" class="border--top">
            <div class="ql-format-group">
                <span class="ql-format-button ql-bold"></span>
                <span class="ql-format-button ql-italic"></span>
                <span class="ql-format-button ql-strike"></span>
                <span class="ql-format-button ql-underline"></span>
                <span class="ql-format-separator"></span>
                <select class="ql-size">
                    <option value="10px">Small</option>
                    <option value="14px" selected>Normal</option>
                    <option value="18px">Large</option>
                </select>
                <select title="Font" class="ql-font">
                    <option value="sans-serif" selected="">Sans Serif</option>
                    <option value="serif">Serif</option>
                    <option value="monospace">Monospace</option>
                </select>
                <span class="ql-format-separator"></span>
                <select title="Text Color" class="ql-color">
                    <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected=""></option>
                    <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                    <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                    <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                    <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                    <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                    <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                    <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option>
                    <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                    <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                    <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                    <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                    <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                    <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                    <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                    <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                    <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                    <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                    <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                    <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                    <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                    <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                    <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                    <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                    <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                    <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                    <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                    <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                    <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                    <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                    <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                    <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                    <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                    <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                    <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                </select>
                <select title="Background Color" class="ql-background">
                    <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)"></option>
                    <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                    <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                    <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                    <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                    <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                    <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                    <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)" selected=""></option>
                    <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                    <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                    <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                    <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                    <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                    <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                    <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                    <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                    <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                    <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                    <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                    <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                    <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                    <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                    <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                    <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                    <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                    <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                    <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                    <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                    <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                    <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                    <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                    <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                    <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                    <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                    <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                </select>
                <span class="ql-format-button ql-link"></span>
                <span class="ql-format-separator"></span>
                <span title="Bullet" class="ql-format-button ql-bullet"></span>
                <span class="ql-format-button ql-list"></span>
                <select title="Text Alignment" class="ql-align">
                    <option value="left" label="Left" selected=""></option>
                    <option value="center" label="Center"></option>
                    <option value="right" label="Right"></option>
                    <option value="justify" label="Justify"></option>
                </select>
            </div>

        </div>

        <div id="editorOffer" ql-container></div>
    </article>
    <div class="Button Next" id="stepThreeButton">SIGUIENTE</div>
</section>