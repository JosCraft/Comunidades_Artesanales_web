<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Order; // Asegúrate de tener el modelo de pedidos
use App\Models\OrdersProduct;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class SalesController extends Controller
{
    public function exportPDF(Request $request)
    {
        // Validación de fechas y tipo de reporte
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'report_type' => 'required|in:sales,top_products'
        ]);
    
        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
        $reportType = $request->input('report_type');
    
        if ($reportType == 'sales') {
            $sales = Order::with('orders_products')->whereBetween('created_at', [$startDate, $endDate])
                ->orderBy('created_at', 'desc')
                ->get();
            $totalSales = $sales->sum('grand_total');
            $pdf = Pdf::loadView('admin.sales.pdf', compact('sales', 'totalSales', 'startDate', 'endDate', 'reportType'));
        } else {
            $topProducts = OrdersProduct::select('product_id', 'product_name', \DB::raw('SUM(product_qty) as total_sold'))
                ->whereBetween('created_at', [$startDate, $endDate])
                ->groupBy('product_id', 'product_name')
                ->orderByDesc('total_sold')
                ->get();
            $pdf = Pdf::loadView('admin.sales.pdf', compact('topProducts', 'startDate', 'endDate', 'reportType'));
        }
    
        return $pdf->download('reporte_ventas.pdf');
    }
public function index(Request $request)
{
    // Validación de fechas
  

    // Convertir las fechas a formato Carbon
    $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
    $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
    $reportType = $request->input('report_type');

    if ($reportType == 'sales') {
        // Obtener ventas en el rango de fechas
        $sales = Order::with('orders_products')->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();
         
        // Calcular el total de ventas en el rango
        $totalSales = $sales->sum('grand_total');

        return view('admin.sales.index', compact('sales', 'totalSales', 'startDate', 'endDate', 'reportType'));

    } else {
        // Consulta para productos más vendidos
        $topProducts = OrdersProduct::select('product_id', 'product_name', \DB::raw('SUM(product_qty) as total_sold'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('product_id', 'product_name')
            ->orderByDesc('total_sold')
            ->get();

        return view('admin.sales.index', compact('topProducts', 'startDate', 'endDate', 'reportType'));
    }
}

    public function index2(Request $request)
    {
       
        // Convertir las fechas a formato Carbon
        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
      
        // Obtener ventas en el rango de fechas
        $sales = Order::with('orders_products')->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();
         
        // Calcular el total de ventas en el rango
        $totalSales = $sales->sum('grand_total');
      
        return view('admin.sales.index', compact('sales', 'totalSales', 'startDate', 'endDate'));
    }
    public function topSellingProducts(Request $request)
    {
        //dd('llegooooo');
       /* // Validar fechas ingresadas
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);*/

        // Convertir las fechas a formato Carbon
        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date'))->endOfDay();

        // Consultar los productos más vendidos en el rango de fechas
        $topProducts = OrdersProduct::select('product_id', 'product_name', \DB::raw('SUM(product_qty) as total_sold'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('product_id', 'product_name')
            ->orderByDesc('total_sold')
            ->take(10) // Limitar a los 10 productos más vendidos
            ->get();

        return view('admin.sales.top_selling', compact('topProducts', 'startDate', 'endDate'));
    }   
    // Método para obtener el total de ventas diarias
    public function dailySales()
    {
        $today = Carbon::today();
        
        $totalDailySales = Order::whereDate('created_at', $today)
            ->sum('grand_total'); // Ajusta 'grand_total' según tu campo de total de ventas en la tabla

        return view('admin.sales.daily', compact('totalDailySales'));
    }

    // Método para obtener el total de ventas semanales
    public function weeklySales()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        
        $totalWeeklySales = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->sum('grand_total');

        return view('admin.sales.weekly', compact('totalWeeklySales'));
    }

    // Método para obtener el total de ventas mensuales
    public function monthlySales()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        $totalMonthlySales = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('grand_total');

        return view('admin.sales.monthly', compact('totalMonthlySales'));
    }
}
