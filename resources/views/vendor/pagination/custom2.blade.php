@if ($paginator->hasPages())
     
         
 
            @if ($paginator->hasMorePages())
               
                    
                    <a class="linksb" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="iconb las la-angle-right"></i></a>
                 
            @else
               
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
    background: #ddd;" class="las la-angle-right"></i></a>
               
            @endif
        
  
@endif




