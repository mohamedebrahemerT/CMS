<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Setting;
use App\Models\User;
use App\Queries\InvoiceDataTable;
use App\Repositories\InvoiceRepository;
use Barryvdh\DomPDF\Facade as PDF;
use DataTables;
use DB;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Throwable;
use App\Models\treasury;
use App\Models\withdraw;

class InvoiceController extends AppBaseController
{
    /** @var InvoiceRepository */
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
    }

    /**
     * Display a listing of the Invoice.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index()
    {
         $statusArr = Invoice::STATUS_ARR;

        return view('invoices.index')->with('statusArr', $statusArr);
    }

    /**
     * Show the form for creating a new Invoice.
     *
     * @return Factory|View
     */
    public function create()
    {
          $data = $this->invoiceRepository->getSyncList();

        return view('invoices.create')->with($data);
    }

    /**
     * Store a newly created Invoice in storage.
     *
     * @param  CreateInvoiceRequest  $request
     *
     * @throws Exception|Throwable
     *
     * @return JsonResponse
     */
    public function store(CreateInvoiceRequest $request)
    {
           
        

        try 
        {
            DB::beginTransaction();
             $bill = $this->invoiceRepository->saveInvoice($request->all());

             

            $this->invoiceRepository->saveNotification($request->all());
            DB::commit();
        } catch (Exception $e) 
        {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($bill, __('messages.invoice.invoice') . ' ' . __('messages.common.saved_successfully'));
    }

    /**
     * Display the specified Invoice.
     *
     * @param  Invoice  $invoice
     *
     * @return Factory|View
     */
    public function show(Invoice $invoice)
    {
        $data['hospitalAddress'] = Setting::where('key', '=', 'hospital_address')->first()->value;
         $data['invoice'] = Invoice::with(['invoiceItems.account', 'patient.address'])->find($invoice->id);

        return view('invoices.show')->with($data);
    }

    /**
     * Show the form for editing the specified Invoice.
     *
     * @param  Invoice  $invoice
     *
     * @return Factory|View
     */
    public function edit(Invoice $invoice)
    {
        $invoice->invoiceItems;
        $data = $this->invoiceRepository->getSyncList();
        $data['invoice'] = $invoice;

        return view('invoices.edit')->with($data);
    }

    /**
     * Update the specified Invoice in storage.
     *
     * @param  Invoice  $invoice
     * @param  UpdateInvoiceRequest  $request
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function update(Invoice $invoice, UpdateInvoiceRequest $request)
    {
        try {
            DB::beginTransaction();
            $bill = $this->invoiceRepository->updateInvoice($invoice->id, $request->all());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($bill, __('messages.invoice.invoice') . ' ' . __('messages.common.updated_successfully'));
    }

    /**
     * Remove the specified Invoice from storage.
     *
     * @param  Invoice  $invoice
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function destroy(Invoice $invoice)
    {
        $this->invoiceRepository->delete($invoice->id);

        return $this->sendSuccess(__('messages.invoice.invoice') . ' ' . __('messages.common.deleted_successfully'));
    }

    /**
     * @param Invoice $invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function convertToPdf(Invoice $invoice)
    {
        $invoice->invoiceItems;
        $data = $this->invoiceRepository->getSyncListForCreate($invoice->id);
        $data['invoice'] = $invoice;
        $data['currencySymbol'] = getCurrencySymbol();
        $pdf = PDF::loadView('invoices.invoice_pdf', $data);

        return $pdf->stream('invoice.pdf');
    }

    public function print($id)
    {
        $Invoice= Invoice::where('id',$id)->first();
        return view('invoices.print',compact('Invoice'));
        
    }
    public function withdraw(Request $request)
    {

       $main= withdraw::sum('amount');

      $treasury= treasury::first();
      $treasury->main= $main;
      $treasury->save();


          if ($request->ajax()) {
            $data = withdraw::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                   
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('invoices.withdraw');
       
        
    }

    public function createwithdraw(  )
    {

        return view('invoices.createwithdraw');

       
    }

    public function withdrawstore()
    {

      $treasury= treasury::first();
      

        if ( $treasury->diff == 0) 
        {
              session()->flash('danger','????????  ????????????  ??????????????  ???? ???????? ');

            return back();
           
        }
      $withdraw=   withdraw::create([
            'amount'=>request('amount'),
            'date'=>date('Y-m-d'),
            'time'=>date('h:m:s'),
         ]);

 
        session()->flash('success', '????  ??????????  ?????????? ');

        return Redirect('/withdraw');
    }
}
