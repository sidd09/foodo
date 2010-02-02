from foodoserver.restaurants.models import Restaurant, Type
from django.contrib import admin

class TypeInline(admin.TabularInline):
    model = Type.restaurants.through

class RestaurantAdmin(admin.ModelAdmin):
    inlines = [TypeInline,]

class TypeAdmin(admin.ModelAdmin):
    inlines = [TypeInline,]
    exclude = ('restaurants')
    
admin.site.register(Restaurant)
admin.site.register(TypeAdmin)
