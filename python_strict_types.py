from inspect import signature, Parameter


def strict(func):
  def inner(*args,**kwargs):
    sig = signature(func)
    """
    points to remember:
      1) sig.parameters.items(),
      2) sig.parameters.keys(),
      3) sig.parameters.values(),
      4) sig.empty
      5) sig.return_annotation
    """
    argvals = dict(zip(sig.parameters.keys(), args))
    for key,value in sig.parameters.items():
      print(key,":",value.annotation,":",argvals[key])
      if isinstance(argvals[key],value.annotation):
        print("yes")
      else:
        x = "Args passed to function {func_name} must be of type {expected} but {actual} given".format(func_name=func.__name__,expected=type(argvals[key]),actual=value.annotation)
        raise Exception(x)
    result = func(*args,**kwargs)
    if not type(sig.return_annotation) == type(result):
      z = "Value returned by function {func_name} must be of type {expected} but {actual} returned".format(func_name=func.__name__,expected=sig.return_annotation,actual=type(result))
      raise Exception(z)
    return result
    
  return inner
      
    
@strict
def p(a:int,b:int) -> str:
  pass

p(23,45)
