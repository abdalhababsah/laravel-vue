<script setup>
import { onMounted, ref } from 'vue';
import { initFlowbite } from 'flowbite';
import AdminLayout from './Components/AdminLayout.vue';
import { LiUsers, LaFileInvoiceSolid, HeOutlineMoneyBag, LaShoppingBagSolid } from '@kalimahapps/vue-icons';
import { defineProps, watch } from 'vue';
import ApexCharts from 'vue3-apexcharts'; // Import ApexCharts

const props = defineProps({
    UsersCount: Number,
    ProductCount: Number,
    ActiveOrderCount: Number,
    SalesPercentageChange: Number,
    TotalSales: Number,
    ProductsAddedToday: Number,
    UserPercentageChange: Number,
    WeeklyOrderPercentageChange: Number,

    DailySales: Array,
    DailyOrders: Array,
});

const apexChartOptions = {
    chart: {
        height: '350',
        type: 'line',
    },
    stroke: {
        curve: 'smooth',
    },
    colors: ['#7d836d'],
    grid: {
        padding: {
            top: 5,
            bottom: 5,
            left: 5,
            right: 5,
        },
    },
    tooltip: {
        x: {
            show: false,
        },
        y: {
            title: {
                formatter: (val) => '',
            },
        },
    },
};
// Define and initialize chart data
const lineChartData = ref({
    series: [{ name: 'Sales', data: [] }]
});
const barChartData = ref({
    series: [{ name: 'Total Orders', data: [] }]
});

// Define chart options


// Watch for changes in props.DailySales
watch(
    () => props.DailySales,
    (newSalesData) => {
        if (newSalesData.length === 0) {
            lineChartData.value.series[0].data = [0, 0, 0, 0, 0, 0, 0]; // Display zeros if no sales data
        } else {
            lineChartData.value.series[0].data = newSalesData.map(data => parseFloat(data.total_sales));
        }
    },
    { immediate: true }
);

// Watch for changes in props.DailyOrders
watch(
    () => props.DailyOrders,
    (newOrdersData) => {
        if (newOrdersData.length === 0) {
            barChartData.value.series[0].data = [0, 0, 0, 0, 0, 0, 0]; // Display zeros if no orders data
        } else {
            barChartData.value.series[0].data = newOrdersData.map(data => parseInt(data.total_orders, 10));
        }
    },
    { immediate: true }
);

onMounted(() => {
    initFlowbite();
});
</script>
<template>
    <AdminLayout>
        <div class="relative bg-[#b0956e] md:pt-2 pb-32 pt-2">
            <div class="px-4  mx-auto w-full">
                <!-- Card stats -->
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">Active Orders</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ ActiveOrderCount}}</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full">
                                            <LaFileInvoiceSolid class="h-10 text-black"/>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="mr-2 text-emerald-500">
                                        <i class="fas fa-arrow-up"></i>{{ WeeklyOrderPercentageChange??0 }}%
                                    </span>
                                    <span class="whitespace-nowrap">Since last week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">USERS</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ UsersCount??0 }}</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full">
                                            <LiUsers class="h-10 text-black"/>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="mr-2 text-red-500">
                                        <i class="fas fa-arrow-down"></i> {{ UserPercentageChange??0 }}%
                                    </span>
                                    <span class="whitespace-nowrap">Since last week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">Products</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ ProductCount??0 }}</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full">
                                            <LaShoppingBagSolid class="h-10 text-black"/>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="mr-2 text-orange-500">
                                        <i class="fas fa-arrow-down"></i> {{ ProductsAddedToday?? 0 }}
                                    </span>
                                    <span class="whitespace-nowrap">Added today</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">Sales</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ TotalSales ?? 0 }}
                                            JOD</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full">
                                            <HeOutlineMoneyBag class="h-10 text-black"/>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="mr-2 text-emerald-500">
                                        <i class="fas fa-arrow-up"></i> {{ SalesPercentageChange ?? 0 }}%
                                    </span>
                                    <span class="whitespace-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div>
                <div class="flex flex-wrap">
                    <!-- Line Chart -->
                    <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                            <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full max-w-full flex-grow flex-1">
                                        <h6 class="uppercase text-blueGray-100 mb-1 text-xs font-semibold"> Overview
                                        </h6>
                                        <h2 class="text-black text-xl font-semibold"> Sales value </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 flex-auto">
                                <!-- Apex Line Chart -->
                                <apexchart type="line" :options="apexChartOptions" :series="lineChartData.series"></apexchart>
                            </div>
                        </div>
                    </div>

                    <!-- Bar Chart -->
                    <div class="w-full xl:w-4/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full max-w-full flex-grow flex-1">
                                        <h6 class="uppercase text-blueGray-400 mb-1 text-xs font-semibold"> Performance
                                        </h6>
                                        <h2 class="text-blueGray-700 text-xl font-semibold"> Total orders </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 flex-auto">
                                <!-- Apex Bar Chart -->
                                <apexchart type="bar" :options="apexChartOptions" :series="barChartData.series"></apexchart>
                            </div>
                        </div>


                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-blueGray-700"> Social traffic </h3>
                                    </div>

                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto"><!-- Projects table -->
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead class="thead-light">
                                        <tr>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Referral </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Visitors </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                Facebook </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                1,480 </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                <div class="flex items-center"><span class="mr-2">60%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                                            <div style="width:60%;"
                                                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap mt-4">
                    <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-blueGray-700"> Page visits </h3>
                                    </div>

                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto"><!-- Projects table -->
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Page name </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Visitors </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Unique users </th>
                                            <th
                                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                                Bounce rate </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                /argon/ </th>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                4,569 </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                340 </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                <i class="fas fa-arrow-up text-emerald-500 mr-4"></i> 46,53% </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="block py-4">
                <div class="container mx-auto px-4">
                    <hr class="mb-4 border-b-1 border-blueGray-200">
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4">
                            <div class="text-sm text-blueGray-500 font-semibold py-1 text-center md:text-left">
                                Copyright © 2024 <a href="https://www.shantaty.net"
                                    class="text-[#7d836d] hover:text-blueGray-700 text-sm font-semibold py-1">
                                    Shantaty </a></div>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </AdminLayout>
</template>

<style scoped>
/* Add any additional styles if needed */
</style>
