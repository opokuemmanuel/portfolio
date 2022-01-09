@if ($paginator->hasPages())
     
         
            @if ($paginator->onFirstPage())
              
                    <a style="  display: inline-block;
                    text-align: center;
                    padding: 14px;
                    text-decoration: none;
                    font-size: 24px;
                    padding-left: 50px;
                    padding-right: 20px;" ><i 
                    style="justify-content: center;
    color: #fff;
    padding: 5px;
    border-radius: 50%;
    display: flex;
    font-size: 24px;
    background: #ddd;" class="las la-angle-left"></i></a>
                
            @else
               
                     <a class="linksa" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="icona las la-angle-left"></i></a>
               
            @endif

 
  
@endif




