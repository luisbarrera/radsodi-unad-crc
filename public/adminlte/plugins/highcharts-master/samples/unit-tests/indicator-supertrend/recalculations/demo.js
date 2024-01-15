QUnit.test(
    'Test Absolute Price Oscillator calculations on data updates.',
    function (assert) {
        var chart = Highcharts.stockChart('container', {
            series: [
                {
                    id: 'main',
                    type: 'ohlc',
                    cropThreshold: 30,
                    data: [
                        [1474378200000, 113.05, 114.12, 112.51, 113.57],
                        [1474464600000, 113.85, 113.99, 112.44, 113.55],
                        [1474551000000, 114.35, 114.94, 114, 114.62],
                        [1474637400000, 114.42, 114.79, 111.55, 112.71],
                        [1474896600000, 111.64, 113.39, 111.55, 112.88],
                        [1474983000000, 113, 113.18, 112.34, 113.09],
                        [1475069400000, 113.69, 114.64, 113.43, 113.95],
                        [1475155800000, 113.16, 113.8, 111.8, 112.18],
                        [1475242200000, 112.46, 113.37, 111.8, 113.05],
                        [1475501400000, 112.71, 113.05, 112.28, 112.52],
                        [1475587800000, 113.06, 114.31, 112.63, 113]
                    ]
                },
                {
                    type: 'supertrend',
                    linkedTo: 'main',
                    params: {
                        multiplier: 2,
                        period: 5
                    }
                }
            ]
        });

        function toFastSTWithRound(arr) {
            return arr.map(point => parseFloat(point.toFixed(4)));
        }

        assert.strictEqual(
            chart.series[0].points.length,
            chart.series[1].points.length +
                chart.series[1].options.params.period -
                1,
            'Initial number of Supertrend indicator points is correct'
        );

        chart.series[0].addPoint([
            1475617400000,
            112.06,
            113.31,
            112.43,
            112.95
        ]);

        assert.strictEqual(
            chart.series[0].points.length,
            chart.series[1].points.length +
                chart.series[1].options.params.period -
                1,
            'After addPoint number of Supertrend indicator points is correct'
        );

        chart.series[0].setData(
            [
                [1456441200000, 7099, 7150, 7060, 7104],
                [1456700400000, 7089.3, 7169, 6884.85, 7058.4],
                [1456786800000, 7097.55, 7278.2, 7092.25, 7269.1],
                [1456873200000, 7365, 7410, 7344.15, 7398.3],
                [1456959600000, 7429, 7500, 7407, 7489.45],
                [1457046000000, 7486.05, 7520, 7443, 7505.45],
                [1457391600000, 7490.15, 7535, 7457.3, 7496.25],
                [1457478000000, 7463.8, 7588, 7451.75, 7579.55],
                [1457564400000, 7583.3, 7584.6, 7491.6, 7540.1],
                [1457650800000, 7551, 7598, 7508, 7569.45],
                [1457910000000, 7611.35, 7647, 7584.65, 7598.35],
                [1457996400000, 7590.65, 7592, 7532.15, 7545.8],
                [1458082800000, 7541.75, 7598, 7492, 7587.35],
                [1458169200000, 7650, 7660.5, 7545.1, 7576.8],
                [1458255600000, 7600.15, 7668.4, 7587.8, 7658.95],
                [1458514800000, 7677.45, 7773.4, 7672.15, 7763.7],
                [1458601200000, 7748, 7791.55, 7714, 7782.8],
                [1458687600000, 7770, 7809.95, 7738.8, 7801.2],
                [1459116000000, 7777.95, 7796.7, 7686.4, 7718.65],
                [1459202400000, 7710, 7751.95, 7676.65, 7699.45],
                [1459288800000, 7742.1, 7822, 7726.8, 7814.9],
                [1459375200000, 7808.85, 7848.95, 7783.3, 7811.55],
                [1459461600000, 7780.05, 7800, 7733.7, 7776.2],
                [1459720800000, 7788.55, 7839.9, 7767.15, 7820.7],
                [1459807200000, 7769.2, 7790.15, 7645, 7657.7],
                [1459893600000, 7677, 7687.3, 7639, 7667.75],
                [1459980000000, 7664.75, 7670.7, 7590.1, 7599.3],
                [1460066400000, 7599.95, 7629.9, 7584.8, 7611.85],
                [1460325600000, 7628.95, 7743.5, 7566, 7735.3],
                [1460412000000, 7740.5, 7769, 7717.15, 7764.6],
                [1460498400000, 7824.5, 7926.8, 7818.7, 7902.55],
                [1460930400000, 7945.5, 7962, 7885.3, 7955.8],
                [1461103200000, 7985, 7996.5, 7930.15, 7969.9],
                [1461189600000, 8007.5, 8021.9, 7924, 7951.75],
                [1461276000000, 7936.4, 7980, 7922, 7952.1],
                [1461535200000, 7952, 7952, 7867.6, 7901.5],
                [1461621600000, 7878, 8029, 7871.1, 8017.2],
                [1461708000000, 7993.5, 8035.15, 7991, 8029.95],
                [1461794400000, 8024, 8037, 7884, 7895.3],
                [1461880800000, 7887, 7950, 7831.1, 7894.8],
                [1462140000000, 7858.2, 7874.45, 7805.1, 7840.1],
                [1462226400000, 7848.75, 7949.95, 7770.1, 7783.8],
                [1462312800000, 7755, 7789, 7725, 7732.75],
                [1462399200000, 7741, 7817.5, 7733, 7773.1],
                [1462485600000, 7733.7, 7770.6, 7700.95, 7760.25],
                [1462744800000, 7794.9, 7912.2, 7775, 7904.3],
                [1462831200000, 7894, 7933.55, 7867.15, 7919.75],
                [1462917600000, 7810.35, 7909.9, 7798.2, 7865.85],
                [1463004000000, 7886, 7939.4, 7860.4, 7928.2],
                [1463090400000, 7891.2, 7891.8, 7787.3, 7830.55],
                [1463349600000, 7840, 7898.1, 7780.1, 7887.2],
                [1463436000000, 7920, 7957.8, 7896, 7907.6]
            ],
            true
        );

        assert.strictEqual(
            chart.series[0].data.length,
            chart.series[1].data.length +
                chart.series[1].options.params.period -
                1,
            'After setData number of Supertrend indicator points is correct'
        );

        chart.series[1].update({
            risingTrendColor: '#06B535',
            fallingTrendColor: '#F21313',
            changeTrendLine: {
                styles: {
                    lineWidth: 0.5,
                    lineColor: '#2c2c2c',
                    dashStyle: 'Dash'
                }
            },
            params: {
                multiplier: 3,
                period: 10
            }
        });

        assert.deepEqual(
            toFastSTWithRound(chart.series[1].yData),
            [
                7959.8333,
                7959.8333,
                7932.4085,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7886.5495,
                7886.5495,
                7886.5495,
                7563.4215,
                7622.2444,
                7672.1549,
                7681.527,
                7681.527,
                7681.527,
                7681.527,
                7732.7762,
                7732.7762,
                7732.7762,
                7732.7762,
                7732.7762,
                8068.1886,
                8068.1886,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653
            ],
            'Correct values'
        );

        chart.series[0].points[chart.series[0].points.length - 1].remove();

        assert.deepEqual(
            toFastSTWithRound(chart.series[1].yData),
            [
                7959.8333,
                7959.8333,
                7932.4085,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7910.1002,
                7886.5495,
                7886.5495,
                7886.5495,
                7563.4215,
                7622.2444,
                7672.1549,
                7681.527,
                7681.527,
                7681.527,
                7681.527,
                7732.7762,
                7732.7762,
                7732.7762,
                7732.7762,
                7732.7762,
                8068.1886,
                8068.1886,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653,
                8032.3653
            ],
            'Correct values after point.remove()'
        );

        assert.strictEqual(
            chart.series[1].graphtopLine.attr('stroke'),
            '#F21313',
            'Top line color changed'
        );

        assert.strictEqual(
            chart.series[1].graphbottomLine.attr('stroke'),
            '#06B535',
            'Bottom line color changed'
        );

        assert.strictEqual(
            chart.series[1].graphintersectLine.attr('stroke'),
            '#2c2c2c',
            'Intersect line color changed'
        );

        assert.strictEqual(
            chart.series[1].graphintersectLine.attr('stroke-width'),
            0.5,
            'Intersect line width changed'
        );

        // Indicator cropThreshold has to be equal linked series one
        // reduced by period due to points comparison in drawGraph method
        // (#9787)
        assert.strictEqual(
            chart.series[1].options.cropThreshold +
                chart.series[1].options.params.period -
                1,
            30,
            'Indicator cropThreshold equal main series cropThreshold reduced by period.'
        );
    }
);