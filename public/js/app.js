let rendererD3 = {
    data: {
        widthMap: 0,
        heightMap: 0,
        img: {},
        zoom: d3.zoom()
            .on('zoom', () => {
                d3.select('svg').attr('transform', d3.event.transform);
            }),
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
                        {"x": 27.6, "y": 39.8},
                        {"x": 25.5, "y": 40.8},
                        {"x": 18.7, "y": 44.8},
                        {"x": 19, "y": 47.5},
                        {"x": 19.4, "y": 48.4},
                        {"x": 23, "y": 46.2},
                        {"x": 28.9, "y": 42.5},
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
                        {"x": 22.6, "y": 38.8},
                        {"x": 19.5, "y": 40.3},
                        {"x": 11.8, "y": 44.8},
                        {"x": 12.4, "y": 49},
                        {"x": 12.8, "y": 49.3},
                        {"x": 17, "y": 46.5},
                        {"x": 24.5, "y": 42.1},
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
                        {"x": 16.8, "y": 37.1},
                        {"x": 10.5, "y": 40.4},
                        {"x": 3.9, "y": 44.5},
                        {"x": 4.7, "y": 49.9},
                        {"x": 5, "y": 50.3},
                        {"x": 12, "y": 45.3},
                        {"x": 18.9, "y": 41.4},
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
                rendererD3.ui.appendSvg()
                rendererD3.ui.appendG()
                rendererD3.elements.svg.d3El.call(d3.zoom().scaleExtent([1, 100]).on("zoom", rendererD3.handlers.zoom.zoomed))
                rendererD3.elements.g.d3El.append('rect').attr("width", rendererD3.data.widthMap)
                    .attr("height", rendererD3.data.heightMap)
                    .style("fill", "none")
                    .style("pointer-events", "none")

                // media
                let k = ''
                if (window.matchMedia('(min-width: 1920px)').matches) {
                    k = './images/setka2.jpg'
                }
                if (window.matchMedia('(min-width: 1281px)').matches && window.matchMedia('(max-width: 1920px)').matches) {
                    k = './images/setka22.jpg'
                }
                if (window.matchMedia('(max-width: 1281px)').matches) {
                    k = './images/setka23.jpg'
                }
                // media
                rendererD3.data.widthMap = rendererD3.ui.getWidthD3(map);
                rendererD3.data.heighthMap = rendererD3.ui.getHeightD3(map);
                rendererD3.elements.g.d3El.append('g')
                    .append('svg:image')
                    .attr("href", k)
                    .attr("display", 'block')
                    .attr("width", rendererD3.data.widthMap)
                    .attr("height", rendererD3.data.heightMap);


            },
            addfild: () => {
                rendererD3.ui.appendScaleLiner;
                window.removeEventListener('resize', rendererD3.resize.handlers.resize);
                window.addEventListener('resize', rendererD3.resize.handlers.resize);
                if (window.matchMedia('(min-width: 1920px)').matches) {
                    rendererD3.ui.reCreatePolygon(rendererD3.moca.objects);
                }
                if (window.matchMedia('(min-width: 1281px)').matches && window.matchMedia('(max-width: 1920px)').matches) {
                    rendererD3.ui.reCreatePolygon(rendererD3.moca.objects2);
                }
                if (window.matchMedia('(max-width: 1281px)').matches) {
                    rendererD3.ui.reCreatePolygon(rendererD3.moca.objects3);
                }
            },
            zoomed: () => {
                d3.select('svg').select('g').select('g')
                    .attr("transform", d3.event.transform)
                rendererD3.actions.initZoomActions();
                if (d3.event.transform.k === 1) {
                    // d3.event.transform.x=0;
                    // d3.event.transform.y=0;
                    rendererD3.actions.init();
                }
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
            })
            rendererD3.elements.layout.el.addEventListener('click', () => {
                rendererD3.actions.hideModal()
                rendererD3.actions.hideModalSec()
                rendererD3.actions.hideTour()
                rendererD3.actions.hideLayout()
            })
            rendererD3.ui.getElId('linkD').addEventListener('click', (e) => {
                e.stopPropagation()
                rendererD3.actions.hideX()
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
            const map = `#${rendererD3.elements.map.id}`;
            rendererD3.data.widthMap = rendererD3.ui.getWidthD3(map);
            rendererD3.data.heightMap = rendererD3.ui.getHeightD3(map);
        },
        initView: () => {
            rendererD3.handlers.zoom.removesvg();
            rendererD3.ui.appendSvg();
            rendererD3.ui.appendG();
            rendererD3.ui.appendScaleLiner();
            window.removeEventListener('resize', rendererD3.resize.handlers.resize);
            window.addEventListener('resize', rendererD3.resize.handlers.resize);
            // rendererD3.actions.setMapSize()

            rendererD3.ui.getElId('closer1').addEventListener('click', ()=> {
                rendererD3.actions.addX()
                rendererD3.actions.hideModal()
                rendererD3.actions.hideModalSec()
                rendererD3.actions.hideTour()
                rendererD3.actions.hideLayout()
            })


            // rendererD3.ui.getElId('map').addEventListener('wheel', w => {
            //     if (w.deltaY < 0) {
            //         w.preventDefault()
            //         rendererD3.handlers.zoom.increasezoom()
            //     }
            // })


            if (window.matchMedia('(min-width: 1920px)').matches) {
                rendererD3.ui.createPolygon(rendererD3.moca.objects);
            }
            if (window.matchMedia('(min-width: 1281px)').matches && window.matchMedia('(max-width: 1920px)').matches) {
                rendererD3.ui.createPolygon(rendererD3.moca.objects2);
            }
            if (window.matchMedia('(max-width: 1281px)').matches) {
                rendererD3.ui.createPolygon(rendererD3.moca.objects3);
            }
        },
        initActions: () => {
            d3.select("svg")
                .selectAll("polygon")
                .on("click", (d) => {
                    d3.event.stopPropagation()
                    // rendererD3.handlers.zoom.backtopaint
                    // rendererD3.actions.modalPosition(d)
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
                    d3.event.stopPropagation()
                    // rendererD3.handlers.zoom.backtopaint
                    // rendererD3.actions.modalPosition(d)
                    rendererD3.actions.showModalSec();
                    rendererD3.actions.showModal();
                    rendererD3.actions.showLayout();
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
        hideX: () => {
            rendererD3.ui.getElId('closer1').classList.remove('hide')
        },
        addX: () => {
            rendererD3.ui.getElId('closer1').classList.add('hide')
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
            // rendererD3.elements.modal.el.style.left = 100 * (d.modelView.polygon[d.modelView.polygon.length - 1]['x']) / rendererD3.data.widthMap + '%',
            //     rendererD3.elements.modal.el.style.top = 100 * (d.modelView.polygon[d.modelView.polygon.length - 1]['y']) / rendererD3.data.heightMap + '%'
        },
    },
    resize: {
        handlers: {
            resize: () => {
                // TODO blur or loader
                rendererD3.ui.removeSvg();
                rendererD3.actions.init();
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
                .attr("preserveAspectRatio", 'none')

            ;
        },
        appendG: () => {
            rendererD3.elements.g.d3El = d3.select('svg').append("g")
        },
        appendScaleLiner: () => {
            // rendererD3.elements.scaleLinerX = d3.scaleLinear().domain([0, 1200]).range([0, rendererD3.data.widthMap]);
            // rendererD3.elements.scaleLinerY = d3.scaleLinear().domain([0, 675]).range([rendererD3.data.heightMap, 0]);
        },
        createPolygon: (data) => {
            d3.select('g')
                .selectAll('polygon')
                .data(data)
                .enter().append("polygon")
                .attr("points", (d) => {
                    return d.modelView.polygon.map(d => {
                        return [d.x * rendererD3.data.widthMap / 100, d.y * rendererD3.data.heightMap / 100].join(",");
                    }).join(" ");
                })
                .attr("stroke", item => item.modelView.stroke)
                .attr("fill", item => item.modelView.fill)
                .attr("id", item => item.id)
                .attr("stroke-width", 1)
            d3.select('svg')
                .select('g')
                .selectAll('polygon')
                .data('dataset')
                .enter()
                .append("text")
                .attr("x", data[0].modelView.polygon[1]['x'] - 2 + '%')
                .attr("y", data[0].modelView.polygon[1]['y'] + 3.4 + '%')
                .text("10");
        },


        reCreatePolygon: (data) => {
            d3.select('svg')
                .select('g')
                .select('g')
                .attr('width', rendererD3.data.widthMap)
                .attr('height', rendererD3.data.heightMap)
                .attr('padding', 0)
                .selectAll('polygon')
                .data(data)
                .enter().append("polygon")
                .attr("points", (d) => {
                    return d.modelView.polygon.map(d => {
                        return [d.x * rendererD3.data.widthMap / 100, d.y * rendererD3.data.heighthMap / 100].join(",");
                    }).join(" ");
                })
                .attr("stroke", item => item.modelView.stroke)
                .attr("fill", item => item.modelView.fill)
                .attr("id", item => item.id)
                .attr("stroke-width", 1)

            // d3.select('svg')
            //     .select('g')
            //     .selectAll('polygon')
            //     .data('dataset')
            //     .enter()
            //     .append("text")
            //     .attr("x", data[0].modelView.polygon[0]['x']+'%')
            //     .attr("y", data[0].modelView.polygon[0]['y']+'%')
            //     .text("10");
        }
    },
    ajax: {
        get: (url) => fetch(url, {method: 'GET'})
    }
};

window.addEventListener("load", rendererD3.actions.init());


