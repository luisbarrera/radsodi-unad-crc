Highcharts.chart('container', {

    title: {
        text: 'Custom tick positions'
    },

    subtitle: {
        text: 'through axis.tickPositions and axis.tickPositioner'
    },

    xAxis: {
        tickPositions: [0, 1, 2, 4, 8]
    },

    yAxis: {
        tickPositioner: function () {
            let tick = Math.floor(this.dataMin);
            const positions = [],
                increment = Math.ceil((this.dataMax - this.dataMin) / 6);

            if (this.dataMax !== null && this.dataMin !== null) {
                for (tick;
                    tick - increment <= this.dataMax;
                    tick += increment) {
                    positions.push(tick);
                }
            }
            return positions;
        }
    },

    series: [{
        data: [
            [0, 1],
            [1, 3],
            [2, 2],
            [4, 4],
            [8, 3]
        ]
    }]
});