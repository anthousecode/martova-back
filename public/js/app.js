let rendererD3 = {
    data: {
        widthMap: 0,
        heightMap: 0,
        img: {},
        zoom: d3.zoom()
            .on('zoom', () => {
                d3.select('svg').attr('transform', d3.event.transform);
            })
    },
    moca: {
        objects: [
            {
                id: 'test1',
                status: 'sales',
                // TODO if need this or add new field
                otherInfo: {
                    number: '10',
                    kadNumber: '43342347343:67346:888',
                    square: '0,536',
                    price: '15000'
                },
                modelView: {
                    polygon: [
                        {"x": 181, "y": 453},
                        {"x": 150, "y": 443},
                        {"x": 16, "y": 398},
                        {"x": 26, "y": 358},
                        {"x": 30, "y": 354},
                        {"x": 130, "y": 394},
                        {"x": 207, "y": 423},
                    ],
                    fill: 'yellow',
                    stroke: 'red'
                }
            },
            // {
            //     id: 'test2',
            //     status: 'for sale',
            //     // TODO if need this or add new field
            //     otherInfo: {},
            //     modelView: {
            //         polygon: [
            //             {"x": 522, "y": 372},
            //             {"x": 633, "y": 347},
            //             {"x": 745, "y": 385},
            //             {"x": 729, "y": 408}],
            //         fill: 'green',
            //         stroke: 'blue'
            //     }
            // },
        ],
        objects2: [
            {
                id: 'test1',
                status: 'sales',
                // TODO if need this or add new field
                otherInfo: {
                    number: '10',
                    kadNumber: '43342347343:67346:888',
                    square: '0,536',
                    price: '15000'
                },
                modelView: {
                    polygon: [
                        {"x": 181, "y": 453},
                        {"x": 16, "y": 398},
                        {"x": 26, "y": 358},
                        {"x": 30, "y": 354},
                        {"x": 207, "y": 423}
                    ],
                    fill: 'yellow',
                    stroke: 'red'
                }
            },
            // {
            //     id: 'test2',
            //     status: 'for sale',
            //     // TODO if need this or add new field
            //     otherInfo: {},
            //     modelView: {
            //         polygon: [
            //             {"x": 522, "y": 372},
            //             {"x": 633, "y": 347},
            //             {"x": 745, "y": 385},
            //             {"x": 729, "y": 408}],
            //         fill: 'green',
            //         stroke: 'blue'
            //     }
            // },
        ],
        objects3: [
            {
                id: 'test1',
                status: 'sales',
                // TODO if need this or add new field
                otherInfo: {
                    number: '10',
                    kadNumber: '43342347343:67346:888',
                    square: '0,536',
                    price: '15000'
                },
                modelView: {
                    polygon: [
                        {"x": 181, "y": 453},
                        {"x": 150, "y": 443},
                        {"x": 16, "y": 398},
                        {"x": 26, "y": 358},
                        {"x": 30, "y": 354},
                        {"x": 130, "y": 394},
                        {"x": 207, "y": 423},
                    ],
                    fill: 'yellow',
                    stroke: 'red'
                }
            },
            // {
            //     id: 'test2',
            //     status: 'for sale',
            //     // TODO if need this or add new field
            //     otherInfo: {},
            //     modelView: {
            //         polygon: [
            //             {"x": 522, "y": 372},
            //             {"x": 633, "y": 347},
            //             {"x": 745, "y": 385},
            //             {"x": 729, "y": 408}],
            //         fill: 'green',
            //         stroke: 'blue'
            //     }
            // },
        ],
    },
    elements: {
        map: {class: '', id: 'map', el: {}, d3El: {}},
        svg: {name: 'svg', d3El: {}},
        g: {name: 'g', d3El: {}},
        scaleLinerX: {},
        scaleLinerY: {},
        layout: {id: 'layout', el: {}},
        closer: {id: 'closer', el: {}},
        modal: {id: 'modal', el: {}},
        sec: {id: 'sec', el: {}},
        start: {id: 'start', el: {}},
        stop: {id: 'stop', el: {}},
    },
    handlers: {
        zoom: {
            //start
            increasezoom: () => {
                rendererD3.handlers.zoom.removesvg();
                rendererD3.handlers.zoom.createzoomsvg();
                rendererD3.handlers.zoom.addfild();
            },
            removesvg: () => {
                d3.select('svg').remove();
            },
            createzoomsvg: () => {
                rendererD3.ui.appendSvg();
                rendererD3.ui.appendG();
                rendererD3.elements.svg.d3El.call(d3.zoom().scaleExtent([1, 100]).on("zoom", rendererD3.handlers.zoom.zoomed));
                rendererD3.elements.g.d3El.append('rect').attr("width", rendererD3.data.widthMap)
                    .attr("height", rendererD3.data.heightMap)
                    .style("fill", "none")
                    .style("pointer-events", "none");

                rendererD3.elements.g.d3El.append('g')
                    .append('svg:image')
                    .attr("href", './images/current-img.jpg')
                    .attr("width", rendererD3.data.widthMap)
                    .attr("height", rendererD3.data.heightMap);
                // rendererD3.data.widthMap = rendererD3.ui.getWidthD3(map);
                // rendererD3.data.heighthMap = rendererD3.ui.getHeightD3(map);

            },
            addfild: () => {
                rendererD3.ui.appendScaleLiner;
                window.removeEventListener('resize', rendererD3.resize.handlers.resize);
                window.addEventListener('resize', rendererD3.resize.handlers.resize);
                rendererD3.ui.reCreatePolygon(rendererD3.moca.objects3);
            },
            zoomed: () => {
                d3.select('svg').select('g').select('g')
                    .attr("transform", d3.event.transform)
                if (d3.event.transform.k === 1) {
                    // d3.event.transform.x=0;
                    // d3.event.transform.y=0;
                    rendererD3.actions.init();
                }
                rendererD3.actions.initZoomActions();
            },
            //stop
            backtopaint: () => {
                rendererD3.handlers.zoom.removesvg();
                rendererD3.actions.init();
                rendererD3.actions.initElements();
                rendererD3.actions.initData();
                rendererD3.actions.initView();
                rendererD3.actions.initActions();
            }
        }

    },

    actions: {
        init: () => {
            rendererD3.actions.initElements();
            rendererD3.actions.initData();
            rendererD3.actions.initView();
            rendererD3.actions.initActions();
            rendererD3.elements.closer.el.addEventListener('click', () => {
                rendererD3.actions.hideModal()
                rendererD3.actions.hideModalSec()
                rendererD3.actions.hideTour()
                rendererD3.actions.hideLayout()
                rendererD3.handlers.zoom.backtopaint();
            })
            rendererD3.elements.layout.el.addEventListener('click', () => {
                rendererD3.actions.hideModal()
                rendererD3.actions.hideModalSec()
                rendererD3.actions.hideTour()
                rendererD3.actions.hideLayout()
            })
            rendererD3.ui.getElId('linkD').addEventListener('click', () => {
                rendererD3.actions.hideModal()
                rendererD3.actions.showTour()
                rendererD3.actions.showLayout()
            })
            // rendererD3.elements.start.el.addEventListener('click', rendererD3.handlers.zoom.increasezoom)
            // rendererD3.elements.stop.el.addEventListener('click', rendererD3.handlers.zoom.backtopaint)
            rendererD3.actions.updateInputRange();

        }
        ,
        initElements: () => {
            rendererD3.elements.map.el = rendererD3.ui.getElId(rendererD3.elements.id);
            rendererD3.elements.map.d3El = d3.select(`#${rendererD3.elements.id}`);
            rendererD3.elements.layout.el = rendererD3.ui.getElId(rendererD3.elements.layout.id);
            rendererD3.elements.modal.el = rendererD3.ui.getElId(rendererD3.elements.modal.id);
            rendererD3.elements.sec.el = rendererD3.ui.getElId(rendererD3.elements.sec.id);
            rendererD3.elements.closer.el = rendererD3.ui.getElId(rendererD3.elements.closer.id);
            rendererD3.elements.start.el = rendererD3.ui.getElId(rendererD3.elements.start.id);
            rendererD3.elements.stop.el = rendererD3.ui.getElId(rendererD3.elements.stop.id);
        },
        initData: () => {
            const mapImg = rendererD3.ui.getElId('mapImg')
            rendererD3.data.widthMap = rendererD3.ui.getWidthD3(mapImg);
            rendererD3.data.heightMap = rendererD3.ui.getHeightD3(mapImg);
        },
        initView: () => {
            rendererD3.handlers.zoom.removesvg();
            rendererD3.ui.appendSvg();
            rendererD3.ui.appendG();
            rendererD3.ui.appendScaleLiner();
            window.removeEventListener('resize', rendererD3.resize.handlers.resize);
            window.addEventListener('resize', rendererD3.resize.handlers.resize);
            // rendererD3.actions.setMapSize()
            rendererD3.ui.getElId('map').addEventListener('wheel', w => {
                if (w.deltaY < 0) {
                    w.preventDefault()
                    // rendererD3.handlers.zoom.increasezoom()
                    document.body.classList.add('zoom')
                }
                else{
                    document.body.classList.remove('zoom')
                }
            })
            // rendererD3.handlers.zoom.increasezoom()
            // rendererD3.ui.createPolygon(rendererD3.moca.objects);
            const height = document.documentElement.clientHeight/2;
            const width = document.documentElement.clientWidth/2;
            window.scrollTo( (document.documentElement.scrollWidth/2)- width, (document.documentElement.scrollHeight/2)- height);
        },
        initActions: () => {

            d3.select("svg")
                .selectAll("polygon")
                .on("click", (d) => {
                  console.log(d)
                    d3.event.stopPropagation();
                    rendererD3.actions.modalPosition(d);
                    rendererD3.actions.showModalSec();
                    rendererD3.actions.showModal();
                    rendererD3.actions.showLayout();
                })
                .on("mouseover", (d) => {
                    // rendererD3.actions.showModal();
                })
                .on("mouseleave", (d) => {
                    // rendererD3.actions.hideModal();
                })
        },
        initZoomActions: () => {
            d3.select("svg").select("g").select("g")
                .selectAll("polygon")
                .on("click", (d) => {
                    d3.event.stopPropagation();
                    rendererD3.actions.modalPosition(d)
                    rendererD3.actions.showModalSec();
                    rendererD3.actions.showModal();
                })
        },
        showModal: () => {
            rendererD3.elements.modal.el.classList.remove('hide')
        },
        showLayout: () => {
            rendererD3.elements.layout.el.classList.remove('hide')
        },
        hideLayout: () => {
            rendererD3.elements.layout.el.classList.add('hide')
        },
        showModalSec: () => {
            rendererD3.elements.sec.el.classList.remove('hide')
        },
        hideModal: () => {
            rendererD3.elements.modal.el.classList.add('hide')
        },
        showTour: () => {
            rendererD3.ui.getElId('tour').classList.remove('hide')
        },
        hideTour: () => {
            rendererD3.ui.getElId('tour').classList.add('hide')
        },
        hideModalSec: () => {
            rendererD3.elements.sec.el.classList.add('hide')
        },
        updateInputRange: () => {
            d3.select("#nAngle").on("input", function () {
                rendererD3.actions.update(+this.value);
            });
        },
        update: (nAngle) => {
            // adjust the text on the range slider
            d3.select("#nAngle-value").text(nAngle);
            d3.select("#nAngle").property("value", nAngle);

            // rotate the text
            d3.select("svg").select('g').select('g')
                .attr("transform", "rotate(" + nAngle + ")")
                .attr("transform-origin", "50% 50%")
        },


        modalPosition: (d) => {
            rendererD3.elements.modal.el.style.left = 100 * (d.modelView.polygon[d.modelView.polygon.length - 1]['x']) / 1200 + '%',
                rendererD3.elements.modal.el.style.top = 100 * (d.modelView.polygon[d.modelView.polygon.length - 1]['y']) / 675 + '%'
        },
    },
    resize: {
        handlers: {
            resize: () => {
                // TODO blur or loader
                rendererD3.ui.removeSvg();
                rendererD3.actions.init();
                const height = document.documentElement.clientHeight/2;
                const width = document.documentElement.clientWidth/2;
                window.scrollTo( (document.documentElement.scrollWidth/2)- width, (document.documentElement.scrollHeight/2)- height);
            },
            debounce: (delay, fn) => {
                let timerId;
                return function (...args) {
                    if (timerId) {
                        clearTimeout(timerId);
                    }
                    timerId = setTimeout(() => {
                        fn(...args);
                        timerId = null;
                    }, delay);
                }
            },
        },
    },
    ui: {
        toggleBlur: () => {
        },
        getImg: () => '<img unselectable="on" src="../images/setka2.jpg" class="img-fluid w-100" id="dynamicImg">',
        removeSvg: () => d3.select('svg').remove(),
        getElId: (name) => document.getElementById(name),
        getWidthD3: (name) => Math.round(Number(d3.select(name).style('width').slice(0, -2))),
        getHeightD3: (name) => Math.round(Number(d3.select(name).style('height').slice(0, -2))),
        appendSvg: () => {
            rendererD3.elements.svg.d3El = d3.select("#map").append("svg")
                .attr("width", rendererD3.data.widthMap)
                .attr("height", rendererD3.data.heightMap)

            ;
        },
        appendG: () => {
            rendererD3.elements.g.d3El = d3.select('svg').append("g")
        },
        appendScaleLiner: () => {
            rendererD3.elements.scaleLinerX = d3.scaleLinear().domain([0, 1200]).range([0, rendererD3.data.widthMap]);
            rendererD3.elements.scaleLinerY = d3.scaleLinear().domain([0, 675]).range([rendererD3.data.heightMap, 0]);

            // // TODO delete in feature
            // d3.select('svg').append("g")
            //     .attr("transform", "translate(0, 635)")
            //     .call(d3.axisBottom(rendererD3.elements.scaleLinerX));
            // // TODO delete in feature
            // d3.select('svg').append("g")
            //     .attr("transform", "translate(40,0)")
            //     .call(d3.axisLeft(rendererD3.elements.scaleLinerY));
        },
        // createPolygon: (data) => {
        //
        //     d3.select('g')
        //         .selectAll('polygon').select('g')
        //         .data(data)
        //         .enter().append("polygon")
        //         .attr("points", (d) => {
        //             return d.modelView.polygon.map(d => {
        //                 return [rendererD3.elements.scaleLinerX(d.x), rendererD3.elements.scaleLinerY(d.y)].join(",");
        //             }).join(" ");
        //         })
        //         .attr("stroke", item => item.modelView.stroke)
        //         .attr("fill", item => item.modelView.fill)
        //         .attr("id", item => item.id)
        //         .attr("stroke-width", 1)
        // },


        reCreatePolygon: (data) => {
            d3.select('svg').select('g').select('g')
                .selectAll('polygon')
                .data(data)
                .enter()
                .append("polygon")
                .attr("points", (d) => {
                    return d.modelView.polygon.map(d => {
                        return [rendererD3.elements.scaleLinerX(d.x), rendererD3.elements.scaleLinerY(d.y)].join(",");
                    }).join(" ");
                })
                .attr("stroke", item => item.modelView.stroke)
                .attr("fill", item => item.modelView.fill)
                .attr("id", item => item.id)
                .attr("stroke-width", 1);

          d3.select('svg')
              .select('g')
              .select('g')
              .selectAll('polygon')
              .data("dataset")
              .enter()
              .append("text")
              // Add your code below this line
              // .attr("fill", "red")
              // .text('gfdsgdf')

        }
    },
    ajax: {
        get: (url) => fetch(url, {method: 'GET'})
    }
};

window.addEventListener("load", rendererD3.actions.init());
