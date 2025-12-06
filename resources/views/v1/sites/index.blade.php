@extends('v1.layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('frontend_asset/assets/vendor/libs/apex-charts/apex-charts.css')}}"/>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <!-- Server Info Alert -->
                <div class="alert alert-primary alert-dismissible fade show mb-3" role="alert">
                    <div class="alert-body">
                <span class="fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="me-50 align-middle">
                        <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                        <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                        <line x1="6" y1="6" x2="6.01" y2="6"></line>
                        <line x1="6" y1="18" x2="6.01" y2="18"></line>
                    </svg>
                    <span id="serverInfo">Loading server information...</span>
                </span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>

            <!-- Control Buttons -->
            <div class="d-flex justify-content-end gap-1 mb-3">
                <button class="btn btn-outline-primary btn-sm" id="realtimeToggle" onclick="toggleRealtime()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="me-50">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                    <span id="realtimeText">Real-time OFF</span>
                </button>
                <button class="btn btn-primary btn-sm" onclick="refreshMetrics()" id="refreshBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="me-50">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                    Refresh
                </button>
            </div>
        </div>
        <div class="row mb-3">
            <!-- Statistics -->
            <div class="col-12 col-md-12">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <small class="text-body-secondary" id="lastUpdate">Last updated: Never</small>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-primary me-4 p-2">
                                        <i class="icon-base ti tabler-clock icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0" id="uptimeStat">--</h5>
                                        <small>Uptime</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-info me-4 p-2">
                                        <i class="icon-base ti tabler-activity icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0" id="loadStat">-- / -- / --</h5>
                                        <small>Load Average</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-danger me-4 p-2">
                                        <i class="icon-base ti tabler-list icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0" id="processesStat">--</h5>
                                        <small>Processes</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-success me-4 p-2">
                                        <i class="icon-base ti tabler-cpu icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0" id="archStat">--</h5>
                                        <small>Architecture</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <!-- CPU Card -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-header pb-2 d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">CPU Usage</h5>
                            <p class="card-subtitle" id="cpuCores">-- cores</p>
                        </div>
                        <div>
                            <i class="icon-base ti tabler-cpu icon-lg text-body-secondary"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="cpuChart"></div>
                        <div class="mt-3 text-center">
                            <small class="mt-3" id="cpuModel">Loading...</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Memory Card -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-header pb-2 d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Memory</h5>
                            <p class="card-subtitle" id="memoryStats">-- / --</p>
                        </div>
                        <div>
                            <i class="icon-base ti tabler-inbox icon-lg text-body-secondary"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="memoryChart"></div>
                        <div class="mt-3 text-center">
                            <small class="text-body-secondary mt-3"></small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swap Card -->
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="card-header pb-2 d-flex justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">Memory</h5>
                            <p class="card-subtitle" id="swapStats">-- / --</p>
                        </div>
                        <div>
                            <i class="icon-base ti tabler-transfer icon-lg text-body-secondary"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="swapChart"></div>
                        <div class="mt-3 text-center">
                            <small class="text-body-secondary mt-3"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services & Network -->
        <div class="row g-3 mb-3">
            <!-- Services -->
            <div class="col-lg-6 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Services Status</h4>
                    </div>
                    <div class="card-body p-0" id="servicesContainer">
                        <div class="text-center py-3">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Network -->
            <div class="col-lg-6 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Network Interfaces</h4>
                    </div>
                    <div class="card-body p-0" id="networkContainer">
                        <div class="text-center py-3">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Disk Usage -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Disk Usage</h4>
                    </div>
                    <div class="card-body" id="diskContainer">
                        <div class="text-center py-3">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('frontend_asset/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script>
        (function ($) {
            'use strict';

            let realtimeEnabled = false;
            let eventSource = null;
            let lastUpdateTime = null;

            const cpuElement = document.querySelector('#cpuChart');
            const memoryElement = document.querySelector('#memoryChart');
            const swapElement = document.querySelector('#swapChart');

            if (!cpuElement || !memoryElement || !swapElement) return;

            const options = {
                chart: {
                    height: 200,
                    sparkline: {enabled: true},
                    parentHeightOffset: 0,
                    type: 'radialBar'
                },

                colors: [config.colors.primary],
                series: [],

                plotOptions: {
                    radialBar: {
                        offsetY: 0,
                        startAngle: -90,
                        endAngle: 90,

                        hollow: {
                            size: '75%'
                        },

                        track: {
                            strokeWidth: '45%',
                            background: config.colors.borderColor
                        },

                        dataLabels: {
                            name: {show: false},

                            value: {
                                fontSize: '24px',
                                color: config.colors.headingColor,
                                fontWeight: 500,
                                offsetY: -5
                            }
                        }
                    }
                },

                grid: {
                    show: false,
                    padding: {bottom: 5}
                },

                stroke: {
                    lineCap: 'round'
                },

                labels: ['Progress'],

                responsive: [
                    {
                        breakpoint: 1442,
                        options: {
                            chart: {height: 100},
                            plotOptions: {
                                radialBar: {
                                    hollow: {size: '55%'},
                                    dataLabels: {
                                        value: {
                                            fontSize: '16px',
                                            offsetY: -1
                                        }
                                    }
                                }
                            }
                        }
                    },
                    {
                        breakpoint: 1200,
                        options: {
                            chart: {height: 228},
                            plotOptions: {
                                radialBar: {
                                    hollow: {size: '75%'},
                                    track: {strokeWidth: '50%'},
                                    dataLabels: {value: {fontSize: '26px'}}
                                }
                            }
                        }
                    },
                    {
                        breakpoint: 890,
                        options: {
                            chart: {height: 180},
                            plotOptions: {
                                radialBar: {
                                    hollow: {size: '70%'}
                                }
                            }
                        }
                    },
                    {
                        breakpoint: 426,
                        options: {
                            chart: {height: 142},
                            plotOptions: {
                                radialBar: {
                                    hollow: {size: '70%'},
                                    dataLabels: {value: {fontSize: '22px'}}
                                }
                            }
                        }
                    },
                    {
                        breakpoint: 376,
                        options: {
                            chart: {height: 105},
                            plotOptions: {
                                radialBar: {
                                    hollow: {size: '60%'},
                                    dataLabels: {value: {fontSize: '18px'}}
                                }
                            }
                        }
                    }
                ]
            };

            const cpuChart = new ApexCharts(cpuElement, options);
            cpuChart.render();

            const memoryChart = new ApexCharts(memoryElement, options);
            memoryChart.render();

            const swapChart = new ApexCharts(swapElement, options);
            swapChart.render();

            // Fetch metrics
            function fetchMetrics() {
                $.ajax({
                    url: '/metrics',
                    type: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function (result) {
                        if (result.success) {
                            updateDashboard(result.data);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching metrics:', error);
                        alert('Failed to load metrics');
                    }
                });
            }

            function updateDashboard(metrics) {

                // Update server info
                if (metrics.system) {
                    $('#serverInfo').text(
                        metrics.system.hostname + ' • ' + metrics.system.os + ' ' + metrics.system.kernel
                    );
                    $('#uptimeStat').text(metrics.system.uptime || '--');
                    $('#archStat').text(metrics.system.architecture || '--');
                }

                // Update stats
                if (metrics.load) {
                    $('#loadStat').text(
                        metrics.load['1min'] + ' / ' + metrics.load['5min'] + ' / ' + metrics.load['15min']
                    );
                }
                if (metrics.processes) {
                    $('#processesStat').text(metrics.processes);
                }

                // Update CPU
                if (metrics.cpu) {
                    let cpuPercent = parseFloat(metrics.cpu.usage_percent) || 0;
                    $('#cpuUsage').text(cpuPercent.toFixed(1) + '%');
                    $('#cpuCores').text(metrics.cpu.cores + ' cores');
                    $('#cpuModel').html('<small class="text-muted">' + (metrics.cpu.model || 'Unknown') + '</small>');

                    cpuChart.updateSeries([cpuPercent]);

                    cpuChart.updateOptions({
                        colors: [cpuPercent > 75 ? config.colors.danger : (cpuPercent > 50 ? config.colors.warning : config.colors.primary)],
                        yaxis: [{
                            // Define default min/max or ensure the object exists
                            min: 0,
                            max: 100
                        }],
                    });
                }

                // Update Memory
                if (metrics.memory) {
                    let memPercent = parseFloat(metrics.memory.usage_percent) || 0;
                    $('#memoryUsage').text(memPercent.toFixed(1) + '%');
                    $('#memoryStats').text(metrics.memory.used + ' / ' + metrics.memory.total);

                    memoryChart.updateSeries([memPercent]);

                    memoryChart.updateOptions({
                        colors: [memPercent > 75 ? config.colors.danger : (memPercent > 50 ? config.colors.warning : config.colors.primary)],
                        yaxis: [{
                            // Define default min/max or ensure the object exists
                            min: 0,
                            max: 100
                        }],
                    });

                }

                // Update Swap
                if (metrics.memory && metrics.memory.swap) {
                    let swapPercent = parseFloat(metrics.memory.swap.usage_percent) || 0;
                    $('#swapUsage').text(swapPercent.toFixed(1) + '%');
                    $('#swapStats').text(metrics.memory.swap.used + ' / ' + metrics.memory.swap.total);

                    swapChart.updateSeries([swapPercent]);

                    swapChart.updateOptions({
                        colors: [swapPercent > 75 ? config.colors.danger : (swapPercent > 50 ? config.colors.warning : config.colors.primary)],
                        yaxis: [{
                            // Define default min/max or ensure the object exists
                            min: 0,
                            max: 100
                        }],
                    });

                }

                if (metrics.services) updateServices(metrics.services);
                if (metrics.network) updateNetwork(metrics.network);
                if (metrics.disk) updateDisk(metrics.disk);

                lastUpdateTime = new Date();
                $('#lastUpdate').text('Last updated: ' + lastUpdateTime.toLocaleTimeString());
            }

            function updateServices(services) {
                let html = '<ul class="list-group list-group-flush">';

                $.each(services, function (name, status) {
                    let displayName = name.replace(/-/g, ' ').replace(/\b\w/g, function (l) {
                        return l.toUpperCase();
                    });
                    let badgeClass = status.active ? 'bg-success' : 'bg-danger';
                    let statusText = status.status.charAt(0).toUpperCase() + status.status.slice(1);

                    html += '<li class="list-group-item d-flex justify-content-between align-items-center">';
                    html += '<div>';
                    html += '<h6 class="mb-0">' + displayName + '</h6>';
                    if (status.enabled) {
                        html += '<small class="text-muted">Auto-start enabled</small>';
                    }
                    html += '</div>';
                    html += '<span class="badge ' + badgeClass + ' rounded-pill">' + statusText + '</span>';
                    html += '</li>';
                });

                html += '</ul>';
                $('#servicesContainer').html(html);
            }

            function updateNetwork(interfaces) {
                let html = '<div class="table-responsive"><table class="table table-hover mb-0"><tbody>';

                $.each(interfaces, function (index, iface) {
                    html += '<tr><td>';
                    html += '<h6 class="mb-0">' + iface.name + '</h6>';
                    html += '<div class="mt-1">';
                    html += '<span class="badge bg-success me-1">RX: ' + iface.received + '</span>';
                    html += '<span class="badge bg-info">TX: ' + iface.transmitted + '</span>';
                    html += '</div></td></tr>';
                });

                html += '</tbody></table></div>';
                $('#networkContainer').html(html);
            }

            function updateDisk(disks) {
                let html = '<div class="row">';

                $.each(disks, function (index, disk) {
                    let percent = parseFloat(disk.usage_percent) || 0;
                    let progressColor = getProgressColor(percent);

                    html += '<div class="col-md-6 col-12 mb-2">';
                    html += '<div class="border-start border-primary border-3 ps-2">';
                    html += '<div class="d-flex justify-content-between mb-1">';
                    html += '<h6 class="mb-0">' + disk.mount + '</h6>';
                    html += '<span class="text-muted">' + disk.used + ' / ' + disk.total + '</span>';
                    html += '</div>';
                    html += '<div class="progress mb-1" style="height: 8px;">';
                    html += '<div class="progress-bar ' + progressColor + '" style="width: ' + percent + '%"></div>';
                    html += '</div>';
                    html += '<div class="d-flex justify-content-between">';
                    html += '<small class="text-muted">' + disk.device + ' (' + disk.type + ')</small>';
                    html += '<small class="fw-bold">' + percent.toFixed(1) + '%</small>';
                    html += '</div></div></div>';
                });

                html += '</div>';
                $('#diskContainer').html(html);
            }

            function getProgressColor(percent) {
                if (percent > 80) return 'bg-danger';
                if (percent > 60) return 'bg-warning';
                return 'bg-success';
            }

            window.refreshMetrics = function () {
                let $btn = $('#refreshBtn');
                $btn.prop('disabled', true);
                fetchMetrics();
                setTimeout(function () {
                    $btn.prop('disabled', false);
                }, 1000);
            };

            window.toggleRealtime = function () {
                realtimeEnabled = !realtimeEnabled;

                if (realtimeEnabled) {
                    startRealtime();
                } else {
                    stopRealtime();
                }

                updateRealtimeUI();
            };

            function startRealtime() {
                if (eventSource) return;
                eventSource = new EventSource('/metrics/stream');
                eventSource.onmessage = function (event) {
                    updateDashboard(JSON.parse(event.data));
                };
                eventSource.onerror = function () {
                    stopRealtime();
                    realtimeEnabled = false;
                    updateRealtimeUI();
                };
            }

            function stopRealtime() {
                if (eventSource) {
                    eventSource.close();
                    eventSource = null;
                }
            }

            function updateRealtimeUI() {
                let $btn = $('#realtimeToggle');
                let $text = $('#realtimeText');

                if (realtimeEnabled) {
                    $btn.removeClass('btn-outline-primary').addClass('btn-success pulse-animation');
                    $text.text('Real-time ON');
                } else {
                    $btn.removeClass('btn-success pulse-animation').addClass('btn-outline-primary');
                    $text.text('Real-time OFF');
                }
            }

            $(document).ready(function () {
                fetchMetrics();
                $(window).on('beforeunload', function () {
                    stopRealtime();
                });
            });

        })(jQuery);
    </script>
@endpush
